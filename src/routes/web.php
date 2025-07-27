<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StrukturDataController;
use App\Http\Controllers\QueueLaundryController;
use App\Http\Controllers\StackController;
use App\Http\Controllers\TreeController;
use App\Http\Controllers\GraphController;

Route::get('/', [StrukturDataController::class, 'index'])->name('strukturdata.index');
Route::post('/proses', [StrukturDataController::class, 'proses'])->name('strukturdata.proses');

Route::get('/antrian', [QueueLaundryController::class, 'index'])->name('antrian.index');
Route::post('/antrian/tambah', [QueueLaundryController::class, 'tambah'])->name('antrian.tambah');
Route::post('/antrian/layani', [QueueLaundryController::class, 'layani'])->name('antrian.layani');

Route::get('/stack', [StackController::class, 'index'])->name('stack.index');
Route::post('/stack/tambah', [StackController::class, 'tambah'])->name('stack.tambah');
Route::post('/stack/undo', [StackController::class, 'undo'])->name('stack.undo');
Route::post('/stack/reset', [StackController::class, 'reset'])->name('stack.reset');

Route::get('/tree', [TreeController::class, 'index'])->name('tree.index');
Route::post('/tree/tambah', [TreeController::class, 'tambah'])->name('tree.tambah');
Route::post('/tree/reset', [TreeController::class, 'reset'])->name('tree.reset');

Route::get('/graph', [GraphController::class, 'index'])->name('graph.index');
Route::post('/graph/tambah', [GraphController::class, 'tambahEdge'])->name('graph.tambah');
Route::post('/graph/reset', [GraphController::class, 'reset'])->name('graph.reset');
