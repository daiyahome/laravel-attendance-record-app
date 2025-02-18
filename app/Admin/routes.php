<?php

use Illuminate\Routing\Router;
use App\Admin\Controllers\DepartmentController;
use App\Admin\Controllers\UserController;
use App\Admin\Controllers\HolidayController;
use App\Admin\Controllers\TypeController;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('departments', DepartmentController::class);
    $router->resource('users', UserController::class);
    $router->resource('holidays', HolidayController::class);
    $router->resource('types', TypeController::class);

});
