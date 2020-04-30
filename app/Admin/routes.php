<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');

    $router->get('products', 'ProductsController@index');
    $router->get('products/create', 'ProductsController@create');
    $router->post('products', 'ProductsController@store');
    $router->get('products/{id}/edit', 'ProductsController@edit');
    $router->put('products/{id}', 'ProductsController@update');

    $router->get('licenses', 'LicensesController@index');
    $router->get('licenses/create', 'LicensesController@create');
    $router->post('licenses', 'LicensesController@store');
    $router->get('licenses/{id}/edit', 'LicensesController@edit');
    $router->put('licenses/{id}', 'LicensesController@update');
});
