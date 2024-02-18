<?php

namespace Navari\ZohoDesk;

use Navari\ZohoDesk\Services\ZohoDeskAccessTokenService;
use Navari\ZohoDesk\Services\ZohoDeskDepartmentService;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ZohoDeskServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-zoho-desk')
            ->hasConfigFile();
    }

//    public function registeringPackage()
//    {
//        $this->app->singleton('app', ZohoDesk::class);
//    }

}
