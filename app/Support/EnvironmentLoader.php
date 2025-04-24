<?php

namespace App\Support;

use Dotenv\Dotenv;

class EnvironmentLoader
{
    public static function load(): void
    {
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
        
        if (file_exists(__DIR__.'/../../'.$envFile)) {
            $dotenv = Dotenv::createImmutable(__DIR__.'/../../', $envFile);
            $dotenv->load();
        }
    }
}
