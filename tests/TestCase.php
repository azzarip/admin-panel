<?php

namespace Azzarip\AdminPanel\Tests;

use Illuminate\Support\Facades\Artisan;
use Azzarip\AdminPanel\Tests\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Orchestra\Testbench\TestCase as Orchestra;
use Azzarip\AdminPanel\AdminPanelServiceProvider;

class TestCase extends Orchestra
{
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->setUpDatabase(app());

        $this->actingAs($this->user);

        Artisan::call('admin-panel:install');
        $this->withoutVite();
    }

    protected function getPackageProviders($app)
    {
        return [
            AdminPanelServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
   }

    protected function setUpDatabase($app)
    {
        $schema = $app['db']->connection()->getSchemaBuilder();

        $schema->create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
        });

        $this->user = User::create(['name' => 'Test User', 'email' => 'test@user.com']);
    }
}
