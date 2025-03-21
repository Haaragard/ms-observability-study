<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Controller;

use Hyperf\HttpServer\Contract\RequestInterface;

class IndexController extends AbstractController
{
    public function __invoke(RequestInterface $request): array
    {
        $user = $request->input('user', 'Hyperf');
        $method = $request->getMethod();

        return [
            'method' => $method,
            'message' => "Hello {$user}.",
        ];
    }
}
