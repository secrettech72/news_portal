<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Resources\Admin\UserResources;

class UserController extends Controller
{
    public function index(){
        return UserResources::collection(App\User::all());
    }
}
