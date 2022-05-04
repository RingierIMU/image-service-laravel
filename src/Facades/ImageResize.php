<?php

namespace RingierIMU\ImageService\Facades;

use Illuminate\Support\Facades\Facade;

class ImageResize extends Facade
{
    /**
     * {@inheritdoc}
     */
    protected static function getFacadeAccessor()
    {
        return 'imageresize';
    }
}
