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

    public function store(Request $request)
    {
        $data = [
            'product_name' => $request->product_name,
            'product_price' => $request->product_price
        ];

        $file= $request->file('product_photo');
        $filename= url('').'/img/'.rand(000000, 999999).$file->getClientOriginalName();
        $file->move(public_path('/img'), $filename);
        $data['product_photo']= $filename;

        if(Product::create($data)){
            return ResponseFormater::success(null,'Berhasil tambah data');
        }else{
            return ResponseFormater::error(null,'Gagal tambah data', 404);
        }
    }
}
