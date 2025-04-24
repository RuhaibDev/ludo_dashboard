<?php

use Dotenv\Dotenv;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

$host = $_SERVER['DB_HOST'] ?? '.env.dev'; 
switch ($host) {
    case 'dev':
        $envFile = '.env.dev';
        break;
    case 'staging':
        $envFile = '.env.stage';
        break;
    case 'production':
        $envFile = '.env.production';
        break;
    default:
        $envFile = '.env.dev';
        break;
}

if (file_exists(__DIR__.'/../'.$envFile)) {
    $dotenv = Dotenv::createImmutable(__DIR__.'/../', $envFile);
    $dotenv->load();
}
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
