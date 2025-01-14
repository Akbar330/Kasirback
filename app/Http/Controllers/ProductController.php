<?php

namespace App\Http\Controllers;

use App\Models\Kasird;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($barcode)
    {
        // Cari produk berdasarkan barcode (atau ID)
        $product = Kasird::where('id', $barcode)->first();

        if ($product) {
            return response()->json($product);
        } else {
            return response()->json(['message' => 'Product not found'], 404);
        }
    }
}
