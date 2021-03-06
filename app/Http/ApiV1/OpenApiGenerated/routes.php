<?php

/**
 * NOTE: This file is auto generated by OpenAPI Generator.
 * Do NOT edit it manually. Run `php artisan openapi:generate-server`.
 */

use Illuminate\Support\Facades\Route;

Route::get('posts/', [\App\Http\ApiV1\Controllers\PostsController::class, 'list'])->name('list');
Route::post('posts/', [\App\Http\ApiV1\Controllers\PostsController::class, 'create'])->name('create');
Route::get('posts/{code}', [\App\Http\ApiV1\Controllers\PostsController::class, 'detail'])->name('detail');
