<?php

declare(strict_types=1);

use App\Infrastructure\Http\Controller\IndexController;
use Hyperf\HttpServer\Router\Router;

Router::addRoute(['GET', 'POST', 'HEAD'], '/', IndexController::class);

Router::get('/favicon.ico', function () {
    return '';
});
