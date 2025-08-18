<?php

namespace Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;
use Tests\CreatesApplication;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();

        $this->setUpDatabase();
    }

    protected function setUpDatabase()
    {
        Artisan::call('migrate:fresh', [
            '--path' => 'tests/database/migrations',
            '--realpath' => true,
        ]);
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }
}
