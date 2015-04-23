<?php namespace Acme\ServiceProvider;

use Illuminate\Support\ServiceProvider;

class PnpaaServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('test', function()
        {
            return new \Acme\Repositories\Test;
        });
        $this->app->bind('data', function()
        {
            return new \Acme\Repositories\Data;
        });
          $this->app->bind('stack', function()
        {
            return new \Acme\Repositories\Stack;
        });

    }

}