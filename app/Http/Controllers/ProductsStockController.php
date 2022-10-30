<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsStockController extends Controller
{
    public function index(){
        $this->data['products'] = Product::all();
        return view('products.stocks', $this->data);
    }
}
