<?php

return [
    'cache-prefix' => 'Artisan_model_cache_',

    'enabled' => env('MODEL_CACHE_ENABLED', false),

    'use-database-keying' => env('MODEL_CACHE_USE_DATABASE_KEYING', true),

    'store' => env('MODEL_CACHE_STORE'),
];
