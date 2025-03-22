<?php

declare(strict_types=1);

use App\Infrastructure\Http\Controller\IndexController;
use App\Infrastructure\Http\Controller\Post\{
    ListPostController,
    ShowPostController,
    StorePostController
};
use Hyperf\HttpServer\Router\Router;

Router::addRoute(['GET', 'POST', 'HEAD'], '/', IndexController::class);

Router::get('/favicon.ico', static function () {
    return '';
});

Router::addGroup('/posts', static function (): void {
    Router::get('', ListPostController::class);
    Router::post('', StorePostController::class);
    Router::get('/{id}', ShowPostController::class);
});
