<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('products.index',[
            'products' => Product::all(),
        ]);
    }

    public function search(){
        return view('products.search',[
            'products' => Product::all()
            ->filter(request(['search']))
            ->paginate(16)->withQueryString(),
        ]);
    }

    public function search_view(){
        return view('products.search',[
            'products' => Product::paginate(16)->withQueryString()
        ]);
    }

    public function show(Product $product){
        return view('products.show', [
            'product' => $product,
         ]);
    }
}    
