<?php

namespace Azzarip\AdminPanel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Azzarip\AdminPanel\AdminPanel
 */
class AdminPanel extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Azzarip\AdminPanel\AdminPanel::class;
    }
}
