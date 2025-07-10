<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;
    use \Sushi\Sushi;


    protected $fillable = [
        'id',
        'domain',
        'status',
        'domain_root',
        'domain_public',
        'php_version',
        'hosting_account',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'hosting_account' => 'array',
    ];

    public function getRows()
    {

        $domains = [];
        try {
            $output = shell_exec('bolt-cli local-api-list-domains');
            $output = json_decode($output, true);
            if (isset($output[0]['domains']) && is_array($output[0]['domains'])) {
                foreach ($output[0]['domains'] as $domain) {
                    $domains[] = [
                        'id' => $domain['id'],
                        'domain' => $domain['domain'],
                        'domain_root' => $domain['domain_root'] ?? false,
                        'domain_public' => $domain['domain_public'] ?? false,
                        'php_version' => $domain['php_version'] ?? 'N/A',
                        'status' => $domain['status'],
                        'hosting_account'=> json_encode($domain['hosting_account']) ?? null,
                        'created_at' => $domain['created_at'],
                        'updated_at' => $domain['updated_at'],
                    ];
                }
            }
        } catch (\Exception $e) {
          //  \Log::error('Error fetching domains: ' . $e->getMessage());
            return [];
        }

        return $domains;

    }

}
