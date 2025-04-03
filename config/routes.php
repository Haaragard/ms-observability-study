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

$tracer = \OpenTelemetry\API\Globals::tracerProvider()->getTracer('demo');
$loggerProvider = \OpenTelemetry\API\Globals::loggerProvider();
$monologHandler = new \OpenTelemetry\Contrib\Logs\Monolog\Handler(
    $loggerProvider,
    \Psr\Log\LogLevel::INFO
);
$monolog = new \Monolog\Logger('otel-php-monolog', [$monologHandler]);

Router::get(
    '/rolldice',
    function (
        \Hyperf\HttpServer\Contract\RequestInterface $request,
        \Hyperf\HttpServer\Contract\ResponseInterface $response
    ) use (
        $tracer,
        $monolog
    ) {
    $span = $tracer->spanBuilder('manual-span')
        ->startSpan();
    $rollDiceResult = random_int(1, 6);

    $monolog->info('rolled dice', ['result' => $rollDiceResult]);

    $span->addEvent('rolled dice', ['result' => $rollDiceResult])
        ->end();

    return $response->json(['result' => $rollDiceResult]);
});
