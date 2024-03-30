<?php

namespace Azzarip\AdminPanel\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class InstallCommand extends Command
{
    public $signature = 'admin-panel:install';

    public $description = 'Install admin panels';

    public function handle(): int
    {
        $destination = resource_path('views/vendor');
        if (!File::isDirectory($destination)) {
            File::makeDirectory($destination, 0755, true, true);
        }
        $destination .= '/admin-panel';
        if (!File::isDirectory($destination)) {
            File::makeDirectory($destination, 0755, true, true);
        }

        Artisan::call('make:admin-panel dashboard');
        $this->info("Panel Dashboard created successfully.");

        return self::SUCCESS;
    }
}
