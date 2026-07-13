<?php

declare(strict_types=1);

namespace Awcodes\Gtm;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class GtmServiceProvider extends PackageServiceProvider
{
    public static string $name = 'gtm';

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasConfigFile()
            ->hasViews();
    }
}
