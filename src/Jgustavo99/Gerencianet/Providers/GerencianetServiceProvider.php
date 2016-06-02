<?php

namespace Jgustavo99\Gerencianet\Providers;

use Illuminate\Support\ServiceProvider;
use Gerencianet\Gerencianet;

class GerencianetServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([__DIR__ . '/../../resources/config/gerencianet.php' => config_path('gerencianet.php')]);
    }

    public function register()
    {
        $this->app->bind('Gerencianet', function () {
            return new Gerencianet([
                'client_id' => config('gerencianet.client_id'),
                'client_secret' => config('gerencianet.client_secret'),
                'sandbox' => config('gerencianet.sandbox')
            ]);
        });
    }
}
