<?php

namespace Jgustavo99\Gerencianet\Facades;

use Illuminate\Support\Facades\Facade;

class Gerencianet extends Facade
{
    protected static function getFacadeAccessor() {
        return 'Gerencianet\Gerencianet';
    }
}