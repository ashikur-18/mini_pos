<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class UserGroupController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['main_manu']    = 'Users';
        $this->data['sub_manu']     = 'Groups';
    }

    public function index(){
        $this->data['groups'] = Group::all();
        return view('groups.groups',$this->data);
    }

    public function create(){
        return view('groups.create',$this->data);
    }

    public function store(Request $request){
        $fromData = $request->all();
        if(Group::create($fromData)){
            Session::flash('message', 'Group Created Successfully');
        }
        return redirect()->to('groups');
    }
    public function destroy($id){
        if(Group::find($id)->delete()){
            Session::flash('message', 'Group Deleted Successfully');
        }
        return redirect()->to('groups');
    }
}
