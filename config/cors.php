<?php

return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'],
    'allowed_methods' => ['*'],
    'allowed_origins' => ['*'],           // or specific domains
    'allowed_headers' => ['*'],
    'supports_credentials' => true,
];
