<?php

namespace RingierIMU\ImageService;

use Illuminate\Support\ServiceProvider;

class ImageResizeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes(
            [
                __DIR__ . '/../config/config.php' => config_path('imageresize.php'),
            ],
            'config'
        );
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/config.php',
            'imageresize'
        );

        $this->app->singleton(
            ImageResize::class,
            function ($app) {
                // backwards compatibility for jobs
                $config = function_exists('domain_config')
                    ? [
                        'url' => domain_config('imageresize.url'),
                        'key' => domain_config('imageresize.key'),
                    ]
                    : $app->make('config')->get('imageresize');

                return new ImageResize(
                    $config['url'],
                    $config['key']
                );
            }
        );
        $this->app->alias(ImageResize::class, 'imageresize');
    }
}
