<?php

use ErtugrulDege\ProductFeederSystem\Http\Controllers\ProductFeederController;
use ErtugrulDege\ProductFeederSystem\Http\Controllers\HomeController;
use ErtugrulDege\ProductFeederSystem\Http\Kernel as HttpKernel;
use ErtugrulDege\ProductFeederSystem\Http\Request;

// Load autoloaded class by composer...
require __DIR__ . "/../vendor/autoload.php";

$app = new HttpKernel();

// Register routes...
$app->get('/', [HomeController::class, 'index']);
$app->get('/feed/{provider}', [ProductFeederController::class, 'index']);
// Register routes...

$app->handle(
    $request = Request::capture()
);
