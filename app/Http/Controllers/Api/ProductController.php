<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function all()
    {
        $products = Product::get();
        if($products)
            return ResponseFormater::success($products,'Data produk berhasil diambil');
        else
            return ResponseFormater::error(null,'Data produk tidak ada', 404);
    }
}
