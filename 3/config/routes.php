<?php

use App\Controllers\HomeController;
use App\Controllers\PostController;
use App\Kernel\Router\Route;

return [
    Route::get('/', [HomeController::class, 'index']),
    Route::post('/add', [PostController::class, 'add']),
    Route::post('/delete', [PostController::class, 'delete']),
    Route::post('/update', [PostController::class, 'update']),
];
