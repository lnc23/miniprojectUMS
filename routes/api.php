<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ItemPenjualanController;


Route::get('/pelanggan', [PelangganController::class, 'index']);
Route::get('/barang', [BarangController::class, 'index']);
Route::get('/penjualan', [PenjualanController::class, 'index']);
Route::get('/itempenjualan', [ItemPenjualanController::class, 'index']);

Route::post('pelanggan', [PelangganController::class, 'create']);
Route::post('barang', [BarangController::class, 'create']);
Route::post('penjualan', [PenjualanController::class, 'create']);

Route::put('pelanggan', [PelangganController::class, 'update']);
Route::put('barang', [BarangController::class, 'update']);


Route::delete('pelanggan', [PelangganController::class, 'delete']);
Route::delete('barang', [BarangController::class, 'delete']);



