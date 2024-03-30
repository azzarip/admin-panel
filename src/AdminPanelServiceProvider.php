<?php

namespace Azzarip\AdminPanel;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Azzarip\AdminPanel\Commands\AdminPanelCommand;

class AdminPanelServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('admin-panel')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_admin-panel_table')
            ->hasCommand(AdminPanelCommand::class);
    }
}
