<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    function home(){
        $user = User::findOrFail(1);
        dd($user);
        // dd($user->roles);
    }
}
