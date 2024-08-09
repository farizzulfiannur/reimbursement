<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function home(){
        $user = Auth::user();
        $total_user = User::count();
        return view('dashboard', compact('user','total_user'));
    }
}
