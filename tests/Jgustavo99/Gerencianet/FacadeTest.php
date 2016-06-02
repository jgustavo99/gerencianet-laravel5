<?php

namespace Jgustavo99\Gerencianet\Tests;

use Jgustavo99\Gerencianet\Facades\Gerencianet;
use Jgustavo99\Gerencianet\Tests\AbstractTestCase;

class FacadeTest extends AbstractTestCase
{
    public function test_container_instance () {
        $this->assertInstanceOf('Gerencianet\Gerencianet', app('Gerencianet'));
    }
    
    public function test_facade_instance () {
        $this->assertInstanceOf('Gerencianet\Gerencianet', app(\Jgustavo99\Gerencianet\Facades\Gerencianet::class)->getFacadeRoot());
    }
}