<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

// 1. Prepare writable storage directories in /tmp for Vercel Serverless
$storagePaths = [
    '/tmp/storage',
    '/tmp/storage/app',
    '/tmp/storage/app/public',
    '/tmp/storage/framework',
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/views',
    '/tmp/storage/logs',
];

foreach ($storagePaths as $path) {
    if (! is_dir($path)) {
        mkdir($path, 0755, true);
    }
}

// 2. Set environment variables for storage
putenv('APP_STORAGE=/tmp/storage');
$_ENV['APP_STORAGE'] = '/tmp/storage';
$_SERVER['APP_STORAGE'] = '/tmp/storage';

putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';
$_SERVER['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';

// 3. Prepare high-speed, self-contained SQLite database in /tmp with pre-seeded portfolio data
$sourceDb = __DIR__.'/../database/database.sqlite';
$targetDb = '/tmp/database.sqlite';
if (! file_exists($targetDb) && file_exists($sourceDb)) {
    copy($sourceDb, $targetDb);
}

// 4. Connect to local SQLite database in /tmp
putenv('DB_CONNECTION=sqlite');
$_ENV['DB_CONNECTION'] = 'sqlite';
$_SERVER['DB_CONNECTION'] = 'sqlite';

putenv('DB_DATABASE='.$targetDb);
$_ENV['DB_DATABASE'] = $targetDb;
$_SERVER['DB_DATABASE'] = $targetDb;

define('LARAVEL_START', microtime(true));

// 5. Register Composer autoloader
require __DIR__.'/../vendor/autoload.php';

// 6. Bootstrap Laravel application
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

// 7. Handle incoming HTTP request
$app->handleRequest(Request::capture());
