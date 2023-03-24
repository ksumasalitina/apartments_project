<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    protected const URL_REGISTER = '/register';
    protected const URL_LOGIN = '/login';
    protected const URL_SEARCH = '/find';

    private function generateDefaultData()
    {
        Artisan::call('db:seed', ['--class' => 'CountrySeeder']);
        Artisan::call('db:seed', ['--class' => 'CitySeeder']);
        Artisan::call('db:seed', ['--class' => 'FacilitySeeder']);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->generateDefaultData();
    }
}
