<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use App\Models\SaleItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['main_manu']    = 'Users';
        $this->data['sub_manu']     = 'Users';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['users'] = User::all();
        return view('users.users',$this->data);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['groups'] = Group::arrayForSelect();
        return view('users.from',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
       $fromData = $request->all();
       if(User::create($fromData)){
           Session::flash('message','User Created Successfully');
       }
       return redirect()->to('users');
    }

    public function show($id){
            $this->data['user'] = User::find($id);
            $this->data['tab_menu'] = 'user_info';
            return view ('users.show',$this->data);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['user']   = User::findOrFail($id);
        $this->data['groups'] = Group::arrayForSelect();
      

        return view ('users.from',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $data           = $request->all();
        $user           = User::find($id);
        $user->group_id = $data['group_id'];
        $user->name     = $data['name'];
        $user->email    = $data['email'];
        $user->phone    = $data['phone'];
        $user->address  = $data['address'];

        if($user->save() ){
            Session::flash('message','User Update Successfully');
        }
        return redirect()->to('users');
    }

    public function destroy($id){
        if(User::find($id)->delete()){
            Session::flash('message', 'User Deleted Successfully');
        }
        return redirect()->to('users');
    }
}
