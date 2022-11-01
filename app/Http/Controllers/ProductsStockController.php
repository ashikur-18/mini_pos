<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsStockController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['main_manu']    = 'Products';
        $this->data['sub_manu']     = 'Stocks';
    }

    public function index(){
        $this->data['products'] = Product::where('has_stock', 1)->get();
        return view('products.stocks', $this->data);
    }
}
