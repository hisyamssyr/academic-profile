<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Create all required directories in writable /tmp
$dirs = [
    '/tmp/storage',
    '/tmp/storage/app',
    '/tmp/storage/framework',
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/cache',
    '/tmp/storage/logs',
    '/tmp/framework',
    '/tmp/framework/views',
    '/tmp/framework/sessions',
    '/tmp/framework/cache',
    '/tmp/logs',
];

foreach ($dirs as $dir) {
    if (! is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
}

// Copy SQLite database to /tmp if present, because SQLite requires write access for WAL/journal
$sqlitePath = __DIR__.'/../database/database.sqlite';
if (file_exists($sqlitePath)) {
    if (! file_exists('/tmp/database.sqlite')) {
        @copy($sqlitePath, '/tmp/database.sqlite');
    }
    $dbPath = '/tmp/database.sqlite';
} else {
    $dbPath = '/tmp/database.sqlite';
    if (! file_exists($dbPath)) {
        @touch($dbPath);
    }
}

// Setup Environment Variables for Vercel Serverless
$envVars = [
    'APP_ENV' => 'production',
    'APP_DEBUG' => 'false',
    'APP_KEY' => 'base64:LkTqyCKYcYonUHhfoy/qxQKe072nWgAFnTm86QxviK4=',
    'APP_MAINTENANCE_DRIVER' => 'file',
    'DB_CONNECTION' => 'sqlite',
    'DB_DATABASE' => $dbPath,
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

// Register Composer Autoloader
require __DIR__.'/../vendor/autoload.php';

try {
    // Bootstrap Laravel Application
    /** @var Application $app */
    $app = require_once __DIR__.'/../bootstrap/app.php';

    // Set storage path to writable /tmp directory
    $app->useStoragePath('/tmp');

    // Handle incoming HTTP request
    $app->handleRequest(Request::capture());
} catch (Throwable $e) {
    http_response_code(500);
    echo '<h1>Laravel Vercel Exception</h1>';
    echo '<p><strong>Message:</strong> '.htmlspecialchars($e->getMessage()).'</p>';
    echo '<p><strong>File:</strong> '.htmlspecialchars($e->getFile()).':'.$e->getLine().'</p>';
    echo '<h3>Stack Trace:</h3>';
    echo '<pre>'.htmlspecialchars($e->getTraceAsString()).'</pre>';
}
