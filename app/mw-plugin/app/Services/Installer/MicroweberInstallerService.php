<?php
namespace App\Services\Installer;



use App\Models\Domain;
use App\Models\Installation;
use Illuminate\Support\Str;
use MicroweberPackages\SharedServerScripts\MicroweberWhitelabelWebsiteApply;

class MicroweberInstallerService
{
    public function install(Domain $findDomain, $data = [])
    {

        $hostingAccountUsername = $findDomain->hosting_account['username'];

        $installPath = $findDomain->domain_root . '/microweber';
        $installPathPublicHtml = $findDomain->domain_public;

        if (!is_dir($installPath)) {
            mkdir($installPath, 0755, true);
        }


        $phpSbin = 'bolt-php83';


        $microweberSettingsFromPanel = setting('microweber');

        $installationType = 'standalone'; // default installation type
        $installationLanguage = 'en';
        $website_manager_url = 'https://microweber.com';

        //$installationTemplate = 'default';


        if (isset($microweberSettingsFromPanel['default_installation_type']) && $microweberSettingsFromPanel['default_installation_type'] == 'standalone') {
            $installationType = 'standalone';
        }
        if (isset($microweberSettingsFromPanel['website_manager_url']) && $microweberSettingsFromPanel['website_manager_url']) {
            $website_manager_url = $microweberSettingsFromPanel['website_manager_url'];
        }

        $install = new \MicroweberPackages\SharedServerScripts\MicroweberInstaller();
        $install->setChownUser($hostingAccountUsername);
        $install->enableChownAfterInstall();

        // $install->setPath($findDomain->domain_public);
        $install->setPath($installPath);
        $install->setSourcePath(config('microweber.sharedPaths.app'));

        $install->setLanguage($installationLanguage);

        $domainForInstall = $findDomain->domain;
        $install->setAppUrl($domainForInstall);


        //$install->setStandaloneInstallation();
        if ($installationType == 'symlink') {
            $install->setSymlinkInstallation();
        } else {
            $install->setStandaloneInstallation();
        }

        $install->setDatabaseDriver('sqlite');

        $emailDomain = 'microweber.com';
        $wildcardDomain = setting('general.wildcard_domain');
        if (!empty($wildcardDomain)) {
            $emailDomain = $wildcardDomain;
        }

        $username = Str::random(8);


        $install->setPhpSbin($phpSbin);

        $install->setAdminEmail($username . '@' . $findDomain->domain);
        $install->setAdminUsername($username);
        $install->setAdminPassword(Str::random(8));

        $status = $install->run();

        if (isset($status['success']) && $status['success']) {

            $sharedAppPath = config('microweber.sharedPaths.app');

            // TODO
//            $whitelabelSettings = setting('microweber.whitelabel');
//            $whitelabelSettings['website_manager_url'] = setting('microweber.website_manager_url');
//
//            $whitelabel = new MicroweberWhitelabelSettingsUpdater();
//            $whitelabel->setPath($sharedAppPath);
//            $whitelabel->apply($whitelabelSettings);

            try {
                $whitelabelApply = new MicroweberWhitelabelWebsiteApply();
                //  $whitelabelApply->setWebPath($findDomain->domain_public);
                $whitelabelApply->setWebPath($installPath);
                $whitelabelApply->setSharedPath($sharedAppPath);
                $whitelabelApply->apply();
            } catch (\Exception $e) {
                //   \Log::error('Error applying whitelabel to website: ' . $mwInstallation->installation_path);
            }

            $findInstallation = Installation::where('installation_path', $installPath)
                ->where('domain_id', $findDomain->id)
                ->first();

            if (!$findInstallation) {
                $findInstallation = new Installation();
                $findInstallation->domain_id = $findDomain->id;
                $findInstallation->installation_path = $installPath;
            }

            $findInstallation->app_version = 'latest';
            //$findInstallation->template = $installationTemplate;

            if ($installationType == 'symlink') {
                $findInstallation->installation_type = 'symlink';
            } else {
                $findInstallation->installation_type = 'standalone';
            }


            //symlink public folder
            if (is_dir($installPathPublicHtml)) {
                //rename the public folder to public_old
                rename($installPathPublicHtml, $installPathPublicHtml . '_old');
            }

            if (!is_link($installPathPublicHtml)) {
                symlink($installPath . '/public', $installPathPublicHtml);
            }

            shell_exec('chown -R ' . $hostingAccountUsername . ':' . $hostingAccountUsername . ' ' . $installPath);

            $findInstallation->save();


//            $envJob = new UpdateEnvVarsToWebsite();
//            $envJob->setInstallationId($findInstallation->id);
//            $envJob->handle();

        }

    }
}
