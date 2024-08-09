<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function login(){
        return view('login');
    }

    function storeLogin(Request $request)
    {
        // dd($request);
        $data = [
            'NIP' => $request->NIP,
            'password' => $request->password
        ];
        if (Auth::attempt($data)) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
