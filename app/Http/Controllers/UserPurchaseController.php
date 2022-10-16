<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserPurchaseController extends Controller
{
    public function __construct(){
        $this->data['tab_menu'] = 'purchases';
    }
    public function index($id)
    {
        $this->data['user'] = User::findOrFail($id);

        return view('users.purchases.purchases',$this->data);
    }
}
