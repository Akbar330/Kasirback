<?php

use App\Models\Kasir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ProductController;

Route::get('/products/{barcode}', [ProductController::class, 'show']);


Route::post('/scan', function (Request $request) {
    $barcode = $request->input('barcode');
    \Log::info('Scanned Barcode:', ['barcode' => $barcode]);  // Log incoming barcode

    $product = Kasir::where('barcode', $barcode)->first();  // Query product by barcode

    if ($product) {
        return response()->json($product);
    }

    Log::error('Product not found for barcode:', ['barcode' => $barcode]);  // Log if product not found
    return response()->json(['error' => 'Product not found'], 404);
});


Route::get('/data', [ApiController::class, 'getData']);
Route::post('/data', [ApiController::class, 'storeData']);

Route::post('/api/store', [ApiController::class, 'storeData']);
Route::get('/api/data', [ApiController::class, 'getData']);
// Rute untuk memindai barcode


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
