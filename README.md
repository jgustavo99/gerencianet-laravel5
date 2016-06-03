# Integração Gerencianet SDK para Laravel 5

Esse pacote utiliza a lib [Gerencianet SDK PHP](https://github.com/gerencianet/gn-api-sdk-php/), gerando um ServiceProvider e Facade para aplicações Laravel 5.

[![Build Status](https://travis-ci.org/jgustavo99/gerencianet-laravel5.svg?branch=master)](https://travis-ci.org/jgustavo99/gerencianet-laravel5)

### Instalação

Para instalar, rode no [composer](https://getcomposer.org/) o seguinte comando:

```sh
composer require jgustavo99/gerencianet-laravel5
```

### Adicione o Service Provider

Adicione o seguinte service provider em seu arquivo `config/app.php`:

```php
'providers' => [
    //...
    Jgustavo99\Gerencianet\Providers\GerencianetServiceProvider::class,
]
```

### Publicando o arquivo de configuração
Para publicar os arquivos de configuração, rode o seguinte comando no artisan:

```sh
php artisan vendor:publish
```

Edite o arquivo `config/gerencianet.php`, entrando com seu Client ID, Client Secret e ambiente (se for ambiente sandbox adiciona o valor *true* caso contrário *false*).

### Facade (Opcional)
Para adicionar a Facade `Gerencianet`, adicione em seu arquivo `config/app.php`:

```php
'aliases' => [
    //...
    'Gerencianet' => Jgustavo99\Gerencianet\Facades\Gerencianet::class,
],
```

### Exemplo de utilização básica
```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Gerencianet\Gerencianet;

class GerencianetController extends Controller
{
    public function create(Gerencianet $gerencianet)
    {
        /**
         * Create Charge
         */
        $items = [
            [
                'name' => 'Item 1',
                'amount' => 1,
                'value' => 1000
            ]
        ];
        
        $createCharge = $gerencianet->createCharge([], ['items' => $items]);
        
        /**
         * Create Paying Charges
         */
        $params = ['id' => $createCharge['data']['charge_id']];
        
        $customer = [
            'name' => 'Gorbadoc Oldbuck',
            'cpf' => '04267484171',
            'phone_number' => '5144916523'
        ];
        
        $body = [
            'payment' => [
                'banking_billet' => [
                    'expire_at' => '2018-12-12',
                    'customer' => $customer
                ]
            ]
        ];
        
        $payCharge = $gerencianet->payCharge($params, $body);
        
        //...
    }
}
  
?>
```
Acesse a documentação oficial do [Gerencianet SDK PHP](https://github.com/gerencianet/gn-api-sdk-php#additional-documentation) para saber mais detalhes e exemplos de utilização.


