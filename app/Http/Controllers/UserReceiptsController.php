<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserReceiptsController extends Controller
{
    public function __construct(){
        $this->data['tab_menu'] = 'receipts';
    }
    public function index($id)
    {
        $this->data['user'] = User::findOrFail($id);

        return view('users.receipts.receipts',$this->data);
    }
}
