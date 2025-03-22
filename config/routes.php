<?php

declare(strict_types=1);

use App\Infrastructure\Http\Controller\IndexController;
use App\Infrastructure\Http\Controller\Post\{
    StoreGetController as PostGetController,
    StoreShowController as PostShowController,
    StorePostController as PostStoreController
};
use Hyperf\HttpServer\Router\Router;

Router::addRoute(['GET', 'POST', 'HEAD'], '/', IndexController::class);

Router::get('/favicon.ico', function () {
    return '';
});

Router::addGroup('/posts', static function (): void {
    Router::get('', PostGetController::class);
    Router::post('', PostStoreController::class);
    Router::get('/{id}', PostShowController::class);
});
