<?php
require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$database = database_path('database.sqlite');
$output = database_path('dump/database_ex5_backup.sqlite');

if (file_exists($database)) {
    copy($database, $output);
    echo "✅ Dump criado: $output\n";
} else {
    echo "❌ Banco não encontrado!\n";
}