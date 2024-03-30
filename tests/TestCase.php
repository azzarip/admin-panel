<?php

namespace Azzarip\AdminPanel\Tests;

use Azzarip\AdminPanel\Tests\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Orchestra\Testbench\TestCase as Orchestra;
use Azzarip\AdminPanel\AdminPanelServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestCase extends Orchestra
{
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->setUpDatabase(app());

        $this->actingAs($this->user);

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Azzarip\\AdminPanel\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
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
        /*
        $migration = include __DIR__.'/../database/migrations/create_admin-panel_table.php.stub';
        $migration->up();
        */
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
