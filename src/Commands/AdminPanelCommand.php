<?php

namespace Azzarip\AdminPanel\Commands;

use Illuminate\Console\Command;

class AdminPanelCommand extends Command
{
    public $signature = 'admin-panel';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
