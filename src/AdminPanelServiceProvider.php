<?php

namespace Azzarip\AdminPanel;

use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Config;
use Spatie\LaravelPackageTools\Package;
use Azzarip\AdminPanel\Commands\InstallCommand;
use Azzarip\AdminPanel\Commands\MakePanelCommand;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class AdminPanelServiceProvider extends PackageServiceProvider
{
    public function registeringPackage(): void
    {
        Fortify::loginView(fn () => view('admin-panel::login'));
        Config::set('fortify.domain', 'admin.pizzasquad.test');
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
