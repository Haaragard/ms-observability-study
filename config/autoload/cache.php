<?php

declare(strict_types=1);

use function Hyperf\Support\env;

return [
    'default' => [
        'driver' => Hyperf\Cache\Driver\RedisDriver::class,
        'packer' => Hyperf\Codec\Packer\PhpSerializerPacker::class,
        'prefix' => env('CACHE_PREFIX', 'c:'),
        'skip_cache_results' => [],
    ],

    'keys' => [
        'post' => [
            'list' => 'post:list:page:%d:perPage:%d',
            'show' => 'post:show:%d',
        ],
    ],
];
