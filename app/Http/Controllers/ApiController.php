<?php

namespace App\Http\Controllers;

use App\Models\Kasir;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Ubah nama fungsi menjadi getProductById
    public function getProductById($id)
    {
        try {
            // Mencari produk berdasarkan ID
            $product = Kasir::find($id); // Gunakan find untuk mencari berdasarkan primary key

            // Jika produk tidak ditemukan
            if (!$product) {
                return response()->json([
                    'message' => 'Product not found',
                ], 404); // Status 404 jika produk tidak ditemukan
            }

            return response()->json([ // Jika produk ditemukan, kembalikan data produk
                'message' => 'Product fetched successfully',
                'data' => $product,
            ], 200); // Status 200 jika berhasil
        } catch (\Exception $e) {
            // Tangani error jika ada kesalahan pada server
            return response()->json([
                'message' => 'Failed to fetch product data',
                'error' => $e->getMessage(),
            ], 500); // Status 500 untuk error server
        }
    }
}
