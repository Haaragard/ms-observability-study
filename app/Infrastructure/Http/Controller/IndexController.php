<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Controller;

class IndexController extends AbstractController
{
    public function __invoke(): array
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        return [
            'method' => $method,
            'message' => "Hello {$user}.",
        ];
    }
}
