<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\SaleItems;
use App\Models\SaleInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\InvoiceRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\InvoiceProductRequest;


class UserSalesController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['tab_menu'] = 'sales';
    }
    public function index($id)
    {
        $this->data['user'] = User::findOrFail($id);

        return view('users.sales.sales',$this->data);
    }

    public function createInvoice(InvoiceRequest $request,$user_id)
    {
        $formData 				= $request->all();
    	$formData['user_id'] 	= $user_id;
        $formData['admin_id'] 	= Auth::id();

    	if( SaleInvoice::create($formData) ) {
            Session::flash('message', 'Sale Invoice Create Successfully');
        }
        
        return redirect()->route('user.sales', ['id' => $user_id]);
    }

    public function invoice($user_id, $invoice_id)
    {
        $this->data['user']      = User::findOrFail($user_id);
        $this->data['invoice']   = SaleInvoice::findOrFail($invoice_id);
        $this->data['products']  = Product::arrayForSelect();
   
       

        return view('users.sales.invoice', $this->data);
    }


/**
 * 
 * 
*/    
    public function addItem(InvoiceProductRequest $request, $user_id, $invoice_id)
    {
        $formData = $request->all();
        $formData['sale_invoice_id'] = $invoice_id;

        if( SaleItems::create($formData) ) {
            Session::flash('message', 'Item Added Successfully');
        }
        
        return redirect()->route( 'user.sales.invoice_details', ['id' => $user_id, 'invoice_id' => $invoice_id] );
    }

/**
 * 
 * 
*/

    public function destroyItem($user_id, $invoice_id, $item_id)
    {
        if( SaleItems::destroy( $item_id ) ) {
            Session::flash('message', 'Item Deleted Successfully');   
        }

        return redirect()->route( 'user.sales.invoice_details', ['id' => $user_id, 'invoice_id' => $invoice_id] );
    }


/**
 * 
 * 
*/
    public function destroy($user_id, $invoice_id)
    {
        if( SaleInvoice::destroy($invoice_id) ) {
            Session::flash('message', 'Invoice Deleted Successfully');
        }

        return redirect()->route( 'user.sales', ['id' => $user_id] );
    }



}
