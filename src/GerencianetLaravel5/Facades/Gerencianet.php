<?php

namespace GerencianetLaravel5\Facades;

use Illuminate\Support\Facades\Facade;

class Gerencianet extends Facade
{
    protected static function getFacadeAccessor() {
        return 'Gerencianet\Gerencianet';
    }
}