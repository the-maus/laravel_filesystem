<?php

use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', [FileController::class, 'index'])->name('home');

Route::get('/storage-local-create', [FileController::class, 'storageLocalCreate'])->name('storage.local.create');
Route::get('/storage-local-append', [FileController::class, 'storageLocalAppend'])->name('storage.local.append');
Route::get('/storage-local-read', [FileController::class, 'storageLocalRead'])->name('storage.local.read');
Route::get('/storage-local-read-multi', [FileController::class, 'storageLocalReadMulti'])->name('storage.local.read-multi');