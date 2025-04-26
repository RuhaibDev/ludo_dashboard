<?php

namespace App\Support;

use Dotenv\Dotenv;

class EnvironmentLoader
{
    public static function load(): void
    {
        $host = $_SERVER['DB_HOST'] ?? '.env.dev';
        $envFile = match ($host) {
            'staging' => '.env.stage',
            'production' => '.env.production',
             default => '.env.dev',
        };

        if (file_exists(__DIR__.'/../../'.$envFile)) {
            $dotenv = Dotenv::createImmutable(__DIR__.'/../../', $envFile);
            $dotenv->load();
        }
    }
}
