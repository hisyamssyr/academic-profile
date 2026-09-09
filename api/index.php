<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Setup Environment Variables for Vercel Serverless
$envVars = [
    'APP_ENV' => 'production',
    'APP_DEBUG' => 'true',
    'APP_KEY' => 'base64:LkTqyCKYcYonUHhfoy/qxQKe072nWgAFnTm86QxviK4=',
    'VIEW_COMPILED_PATH' => '/tmp/framework/views',
    'APP_CONFIG_CACHE' => '/tmp/config.php',
    'APP_EVENTS_CACHE' => '/tmp/events.php',
    'APP_PACKAGES_CACHE' => '/tmp/packages.php',
    'APP_ROUTES_CACHE' => '/tmp/routes.php',
    'APP_SERVICES_CACHE' => '/tmp/services.php',
    'CACHE_STORE' => 'array',
    'SESSION_DRIVER' => 'cookie',
    'LOG_CHANNEL' => 'stderr',
];

foreach ($envVars as $key => $value) {
    if (! getenv($key)) {
        putenv("{$key}={$value}");
        $_ENV[$key] = $value;
        $_SERVER[$key] = $value;
    }
}

// Create required framework directories in /tmp since Vercel root is read-only
$dirs = [
    '/tmp/framework',
    '/tmp/framework/views',
    '/tmp/framework/sessions',
    '/tmp/framework/cache',
];

foreach ($dirs as $dir) {
    if (! is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
}

// Register Composer Autoloader
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel Application
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

// Set storage path to writable /tmp directory
$app->useStoragePath('/tmp');

// Handle incoming HTTP request
$app->handleRequest(Request::capture());
