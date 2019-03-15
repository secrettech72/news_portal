<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Hash;

class UserController extends Controller
{
    public $base_route = 'admin.user';
    public $panel = 'User';
    public function index(Request $request){
        $panel = 'User';
        $data['rows'] = User::all();
        return view($this->base_route.'.index',compact(['data','panel']));
    }
    public function create(){
        $panel = 'User';
        return view($this->base_route.'.add',compact('data'));
    }
    public function store(Request $request){
        $panel = 'User';
        User::create([
            'email' => $request->email,
            'usernames' => $request->user_name,
            'password' => Hash::make($request->get('password')),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'status' => $request->status,
        ]);
        $request->session()->flash('session','Success The '.$this->panel.' Has Been Added Successfully');
        return redirect()->route($this->base_route);
    }

    public function edit(Request $request,$id){
        $panel = 'User';
        if($data['row'] = User::find($id)){
            return view($this->base_route.'.edit',compact('data'));
        }else{
            $request->session()->flash('session','Sorry The '.$this->panel.' is not found');
            return redirect()->route($this-base_route);
        }
    }

    public function update(){
        if($user = User::find($id)){
            $request->session()->flash('session','Sorry The '.$this->panel.' is not found');
            return redirect()->route($this-base_route);
        }
        $user->update(
            [
                'email' => $request->email,
                'usernames' => $request->user_name,
                'password' => Hash::make($request->get('password')),
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'status' => $request->status,
        ]);
        $request->session()->flash('session','Success The '.$this->panel.'  Info Updated found');
        return redirect()->route($this-base_route);        
    }

    public function delete(Request $request,$id){
        if($user = User::find($id)){
            $user->delete();
        }else{
            $request->session()->flash('session','Success The '.$this->panel.'  Info Updated found');
            return redirect()->route($this-base_route);
        }
    }
}
