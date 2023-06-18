<?php

use Leaf\Database;

require __DIR__ . '/vendor/autoload.php';

try {
    \Dotenv\Dotenv::createUnsafeImmutable(__DIR__)->load();
} catch (\Throwable $th) {
    trigger_error($th);
}

Database::config(DatabaseConfig());

Leaf\Core::paths(PathsConfig());

app()->config(AppConfig());


app()->cors(CorsConfig());

require __DIR__ . '/src/routes/index.php';

app()->run();
