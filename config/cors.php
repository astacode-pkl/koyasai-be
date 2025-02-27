<?php

return [
    /*
     * Kamu bisa menentukan path mana yang akan diterapkan aturan CORS
     */
    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    /*
     * Method HTTP yang diizinkan
     */
    'allowed_methods' => ['*'],

    /*
     * Origin (domain) yang diizinkan mengakses API
     */
    'allowed_origins' => ['*'], // Ganti dengan domain frontendmu, misal 'http://localhost:5173'

    /*
     * Pola regex untuk origin (opsional)
     */
    'allowed_origins_patterns' => [],

    /*
     * Header yang diizinkan dalam permintaan
     */
    'allowed_headers' => ['*'],

    /*
     * Header yang boleh di-exposed ke client
     */
    'exposed_headers' => [],

    /*
     * Berapa lama (detik) hasil preflight request disimpan di cache
     */
    'max_age' => 0,

    /*
     * Izinkan pengiriman kredensial (cookies, auth headers, dll)
     */
    'supports_credentials' => false,
];