<?php

namespace Azzarip\AdminPanel\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakePanelCommand extends Command
{
    public $signature = 'make:admin-panel {input}';

    public $description = 'Make an admin panel';

    public function handle(): int
    {
        $input = $this->argument('input');

        if (empty($input)) {
            $this->error('Panel Name cannot be empty.');
            return self::INVALID;
        }
        $sourcePath = base_path("vendor/azzarip/admin-panel/stubs/dashboard.blade.php");
        $destinationPath = resource_path("views/vendor/admin-panel/{$input}.blade.php");

        if (File::exists($destinationPath)) {
            $this->error("Panel {$input} already exists.");
            return self::FAILURE;
        }

        File::copy($sourcePath, $destinationPath);
        $this->info("Panel {$input} created successfully.");

        return self::SUCCESS;
    }
}
