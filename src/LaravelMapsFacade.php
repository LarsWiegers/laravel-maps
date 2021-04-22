<?php

namespace Larswiegers\LaravelMaps;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Larswiegers\LaravelMaps\Skeleton\SkeletonClass
 */
class LaravelMapsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-maps';
    }
}
