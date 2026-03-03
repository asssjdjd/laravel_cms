<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$laptops = \App\Models\Laptop::paginate(12);

echo "Total: " . $laptops->total() . "\n";
echo "Per Page: " . $laptops->perPage() . "\n";
echo "Current Page Count: " . count($laptops) . "\n";
echo "First Laptop: " . ($laptops->count() > 0 ? $laptops->first()->title : 'No data') . "\n";
