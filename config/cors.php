<?php

return [
    'paths' => ['api/*', 'sanctum/csrf-cookie', 'login', 'logout', 'user', 'contact', 'admin/*', 'project-posts*'],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['http://localhost:3000', 'http://127.0.0.1:3000'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,  // ✅ Required for Sanctum with cookies
];
