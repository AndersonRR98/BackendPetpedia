<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Aquí defines qué dominios pueden acceder a tu API, qué métodos HTTP
    | están permitidos y qué headers se aceptan.
    |
    */

    // ✅ Solo aplica CORS a rutas de la API
    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    // ✅ Permitir todos los métodos HTTP
    'allowed_methods' => ['*'],

    // ✅ Permitir el dominio del frontend (Blade o Vite)
    'allowed_origins' => [
        env('FRONTEND_URL', 'http://localhost:8002'),
    ],

    'allowed_origins_patterns' => [],

    // ✅ Permitir todos los headers (Authorization incluido)
    'allowed_headers' => ['*'],

    // 🔍 Headers que pueden ser expuestos al frontend
    'exposed_headers' => ['Authorization', 'Content-Type'],

    // ⏱ Tiempo máximo de cacheo de preflight
    'max_age' => 0,

    // ⚙️ Permitir credenciales (cookies o tokens en headers)
    'supports_credentials' => true,

];
