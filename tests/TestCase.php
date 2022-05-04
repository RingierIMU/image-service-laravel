<?php

namespace RingierIMU\ImageService\Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;
use RingierIMU\ImageService\Facades\ImageResize;
use RingierIMU\ImageService\ImageResizeServiceProvider;

abstract class TestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            ImageResizeServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'ImageResize' => ImageResize::class,
        ];
    }

    /**
     * Set up the environment.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('imageresize.url', 'https://i.rimu.ci/');
        $app['config']->set('imageresize.key', 'test-key');
    }
}
