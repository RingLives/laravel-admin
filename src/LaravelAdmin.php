<?php

namespace Shohid\LaravelAdmin;

use Illuminate\Container\Container;

abstract class LaravelAdmin
{
    /**
     * The laravel|lumen application instance.
     *
     * @var \Illuminate\Contracts\Foundation\Application|\Laravel\Lumen\Application
     */
    protected $app;

    /**
     * The constructor.
     * @param Container $app
     */
    public function __construct(Container $app)
    {
        $this->app = $app;
    }
}