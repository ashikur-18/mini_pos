<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Receipt;
use App\Models\SaleItems;
use Illuminate\Http\Request;
use App\Models\PurchaseItems;

class DashboardController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['main_manu']    = 'Dashboard';
    }
    
    public function index()
    {   
        $this->data['totalUsers'] 		= User::count('id');
    	$this->data['totalProducts'] 	= Product::count('id');
    	$this->data['totalSales'] 		= SaleItems::sum('total');
    	$this->data['totalPurchases'] 	= PurchaseItems::sum('total');
    	$this->data['totalReceipts'] 	= Receipt::sum('amount');
    	$this->data['totalPayments'] 	= Payment::sum('amount');
        $this->data['totalStock'] 		= PurchaseItems::sum('quantity') - SaleItems::sum('quantity');
        
        return view('dashboard', $this->data);
    }
}
