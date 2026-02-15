<?php

use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', [FileController::class, 'index'])->name('home');

Route::get('/storage-local-create', [FileController::class, 'storageLocalCreate'])->name('storage.local.create');
Route::get('/storage-local-append', [FileController::class, 'storageLocalAppend'])->name('storage.local.append');
Route::get('/storage-local-read', [FileController::class, 'storageLocalRead'])->name('storage.local.read');
Route::get('/storage-local-read-multi', [FileController::class, 'storageLocalReadMulti'])->name('storage.local.read-multi');
Route::get('/storage-local-check-file', [FileController::class, 'storageLocalCheckFile'])->name('storage.local.check-file');
Route::get('/storage-local-store-json', [FileController::class, 'storeJson'])->name('storage.local.store-json');
Route::get('/storage-local-read-json', [FileController::class, 'readJson'])->name('storage.local.read-json');
Route::get('/storage-local-list', [FileController::class, 'listFiles'])->name('storage.local.list');
Route::get('/storage-local-delete', [FileController::class, 'deleteFile'])->name('storage.local.delete');

// folders
Route::get('/storage-local-create-folder', [FileController::class, 'createFolder'])->name('storage.local.create-folder');
Route::get('/storage-local-delete-folder', [FileController::class, 'deleteFolder'])->name('storage.local.delete-folder');