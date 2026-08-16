<?php

declare(strict_types=1);

namespace Awcodes\Gtm\Tests;

use Awcodes\Gtm\GtmServiceProvider;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    use InteractsWithViews;

    public function getEnvironmentSetUp($app): void
    {
        $app['config']->set('gtm.id', 'GTM-XXXXXX');
        $app['config']->set('gtm.enabled', true);

        $app['config']->set('view.paths', [
            ...$app['config']->get('view.paths'),
            __DIR__ . '/resources/views',
        ]);
    }

    protected function getPackageProviders($app): array
    {
        return [
            GtmServiceProvider::class,
        ];
    }
}
