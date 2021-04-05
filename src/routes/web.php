<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    $textobienvenida = "Bienvenido a Api Rest TestBackend 2.0";
    return $textobienvenida;
});

$router->get('/empresa', ['uses' => 'EmpresaController@index']);
$router->get('/empresa/{id}', ['uses' => 'EmpresaController@getEmpresa']);
$router->post('/empresa', ['uses' => 'EmpresaController@createEmpresa']);
$router->put('/empresa/{id}', ['uses' => 'EmpresaController@updateEmpresa']);
$router->delete('/empresa/{id}', ['uses' => 'EmpresaController@deleteEmpresa']);

$router->get('/preguntatres', ['uses' => 'PreguntaController@palindromo']);
$router->post('/preguntacuatro', ['uses' => 'EnvioController@createDelivery']);
$router->get('/preguntacinco', ['uses' => 'PreguntaController@fibonacci']);
$router->get('/preguntaseis/{nkm}', ['uses' => 'PreguntaController@rangodistanciadias']);