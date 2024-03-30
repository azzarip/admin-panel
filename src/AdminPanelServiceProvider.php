<?php

namespace Azzarip\AdminPanel;

use Azzarip\AdminPanel\Commands\InstallCommand;
use Azzarip\AdminPanel\Commands\MakePanelCommand;
use Laravel\Fortify\Fortify;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class AdminPanelServiceProvider extends PackageServiceProvider
{
    public function registeringPackage(): void
    {
        Fortify::loginView(fn () => view('admin-panel::login'));
    }

    public function configurePackage(Package $package): void
    {
        $package
            ->name('admin-panel')
            ->hasRoute('web')
            ->hasCommands([MakePanelCommand::class, InstallCommand::class])
            ->hasViews();
        }
}
