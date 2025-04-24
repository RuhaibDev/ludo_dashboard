<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';


$host = $_SERVER['DB_HOST'];
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

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../', $envFile);
$dotenv->load();

$app->handleRequest(Request::capture());
