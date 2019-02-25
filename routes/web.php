<?php

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

//fix
$router->post('register', 'AuthController@register');
$router->post('login', 'AuthController@login');
$router->get('user/{id}', 'UserController@index');

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('get', function () {
    return 'ini method get';
});

$router->post('post', function () {
    return 'ini method post';
});

$router->put('put', function () {
    return 'ini method put';
});

$router->patch('patch', function () {
    return 'ini method patch';
});

$router->delete('delete', function () {
    return 'ini method delete';
}); 

$router->options('options', function () {
    return 'ini method options';
});
