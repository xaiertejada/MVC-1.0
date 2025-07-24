<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

define('ENVIRONMENT', $_ENV['APP_ENV'] );

define('CONFIG', [
    'dev' => [
        'url' => $_ENV['APP_URL'],
        'db'  => [
            'host' => $_ENV['DB_HOST'],
            'port' => $_ENV['DB_PORT'],
            'name' => $_ENV['DB_NAME'],
            'user' => $_ENV['DB_USER'],
            'pass' => $_ENV['DB_PASS'],
        ]
    ],
    'staging' => [
        'url' => $_ENV['APP_URL'],
        'db'  => [
            'host' => $_ENV['DB_HOST'],
            'port' => $_ENV['DB_PORT'],
            'name' => $_ENV['DB_NAME'],
            'user' => $_ENV['DB_USER'],
            'pass' => $_ENV['DB_PASS'],
        ]
    ]
]);

define('URL_PATH', CONFIG[ENVIRONMENT]['url']);
