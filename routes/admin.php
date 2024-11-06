<?php

use App\Controllers\Admin\DashBoardController;
use App\Controllers\Admin\ProductController;
use App\Controllers\Admin\UserController;

$router->mount('/admin', function () use ($router) {
    $router->get('/', DashBoardController::class . '@index');

    $router->mount('/users', function () use ($router) {
        $router->get('/', UserController::class . '@index');
        $router->get('/create', UserController::class . '@create');
        $router->post('/store', UserController::class . '@store');
        $router->get('/{id}/edit', UserController::class . '@edit');
        $router->post('/{id}/update', UserController::class . '@update');
        $router->post('/{id}/delete', UserController::class . '@destroy');
        $router->post('/{id}', UserController::class . '@show');
    });

    $router->mount('/products', function () use ($router) {
        $router->get('/', ProductController::class . '@index');
        $router->get('/create', ProductController::class . '@create');
        $router->post('/store', ProductController::class . '@store');
        $router->get('/{id}/edit', ProductController::class . '@edit');
        $router->post('/{id}/update', ProductController::class . '@update');
        $router->get('/{id}/delete', ProductController::class . '@delete');
        $router->post('/{id}', ProductController::class . '@show');
    });

    $router->mount('/categories', function () use ($router) {
        $router->get('/', ProductController::class . '@index');
        $router->get('/create', ProductController::class . '@create');
        $router->post('/store', ProductController::class . '@store');
        $router->get('/{id}/edit', ProductController::class . '@edit');
        $router->post('/{id}/update', ProductController::class . '@update');
        $router->get('/{id}/delete', ProductController::class . '@delete');
        $router->post('/{id}', ProductController::class . '@show');
    });

    $router->mount('/orders', function () use ($router) {
        $router->get('/', ProductController::class . '@index');
        $router->get('/create', ProductController::class . '@create');
        $router->post('/store', ProductController::class . '@store');
        $router->get('/{id}/edit', ProductController::class . '@edit');
        $router->post('/{id}/update', ProductController::class . '@update');
        $router->get('/{id}/delete', ProductController::class . '@delete');
        $router->post('/{id}', ProductController::class . '@show');
    });

    // /products/
    // /products/create
    // /products/edit
});
