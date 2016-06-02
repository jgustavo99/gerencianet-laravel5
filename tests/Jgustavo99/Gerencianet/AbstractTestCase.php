<?php

namespace Jgustavo99\Gerencianet\Tests;

use Orchestra\Testbench\TestCase;

abstract class AbstractTestCase extends TestCase
{
    
    protected function getPackageProviders($app)
    {
        return ['Jgustavo99\Gerencianet\Providers\GerencianetServiceProvider'];
    }
    
    protected function getPackageAliases($app)
    {
        return [
            'Gerencianet' => 'Jgustavo99\Gerencianet\Facades\Gerencianet'
        ];
    }
    
    protected function getEnvironmentSetUp($app)
    {
        $gerencianet_config = [
            'client_id' => 'seu_client_id',
            'client_secret' => 'seu_client_secret',
            'sandbox' => true
        ];
        
        $app['config']->set('gerencianet', $gerencianet_config);
    }
}