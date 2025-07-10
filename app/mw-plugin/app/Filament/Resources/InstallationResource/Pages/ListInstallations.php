<?php

namespace App\Filament\Resources\InstallationResource\Pages;

use App\Filament\Resources\InstallationResource;
use App\Models\Domain;
use App\Services\Installer\MicroweberInstallerService;
use Filament\Actions;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;

class ListInstallations extends ListRecords
{
    protected static string $resource = InstallationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('new_installation')
                ->icon('heroicon-o-plus')
                ->modalSubmitActionLabel('Install Microweber')
            ->form([
                Select::make('domain_id')
                    ->label('Domain')
                    ->options(function () {
                        return Domain::all()->pluck('domain', 'id');
                    })
                    ->columnSpanFull()
                    ->searchable()
                    ->required(),

                TextInput::make('installation_directory')
                    ->label('Installation Directory')
                    ->default('/')
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(255),

            ])->action(function($data) {

                    $domain = Domain::find($data['domain_id']);

                    $microweberInstallerService = new MicroweberInstallerService();
                    $install = $microweberInstallerService->install($domain, $data);

                    if ($install) {
                        Notification::make('success')
                            ->success()
                            ->title('Microweber Installation Started')
                            ->body('The installation process has been initiated successfully.')
                            ->send();
                    } else {
                        Notification::make('error')
                            ->title('Installation Failed')
                            ->danger()
                            ->body('There was an error starting the installation process.')
                            ->send();
                    }
                }),
            ];
    }
}
