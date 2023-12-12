<?php

namespace Awcodes\Gtm\Tests;

use Awcodes\Gtm\GtmServiceProvider;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    use InteractsWithViews;

    protected function getPackageProviders($app): array
    {
        return [
            GtmServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app): void
    {
        $app['config']->set('gtm.id', 'GTM-XXXXXX');
        $app['config']->set('gtm.active', true);

        $app['config']->set('view.paths', [
            ...$app['config']->get('view.paths'),
            __DIR__ . '/resources/views',
        ]);
    }
}
