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

$router->get('/staffs', 'StaffController@index');
$router->get('staffs/fetch_staff', 'StaffController@fetch_staff');
$router->get('/staffs/create', 'StaffController@create');
$router->post('/staffs/create', 'StaffController@store');
$router->post('/sendmail', 'StaffController@sendMail');
$router->get('/staffs/edit/{id}', 'StaffController@edit');
$router->post('/staffs/update/{id}', 'StaffController@update');
$router->get('/staffs/{id}', 'StaffController@destroy');

$router->get('/staffs/{id}/contracts', 'ContractController@index');
$router->get('/staffs/{id}/contracts/create', 'ContractController@create');
$router->post('/staffs/{idstaff}/contracts/create', 'ContractController@store');
$router->get('/contracts/edit/{id}', 'ContractController@edit');
$router->post('/{idstaff}/contracts/update/{id}', 'ContractController@update');
$router->get('/{idstaff}/contracts/{id}', 'ContractController@destroy');

$router->get('/', function () use ($router) {
    return $router->app->version();
});
