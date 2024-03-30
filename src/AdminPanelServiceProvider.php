<?php

namespace Azzarip\AdminPanel;

use Livewire\Livewire;
use Laravel\Fortify\Fortify;
use Spatie\LaravelPackageTools\Package;
use Laravel\Jetstream\Http\Livewire\NavigationMenu;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class AdminPanelServiceProvider extends PackageServiceProvider
{
    public function registeringPackage(): void
    {
        Fortify::loginView(fn () => view('admin-panel::login'));
    }

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
            ->hasRoute('web')
            ->hasViews();
        }
}
