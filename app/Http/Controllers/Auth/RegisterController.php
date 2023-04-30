<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){


        return view ('RegisterPage/index');
    }

    public function registerpost(Request $request){

        $data = [
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];

        User::create($data);
        if(response()->json(['success' => 'success', 200])){
             return redirect('login');
        }
         return redirect('register');



    }
}
