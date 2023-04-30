<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{


    public function login()
    {
      return view('LoginPage/index');
    }

    public function loginStore(Request $request){

        $credential = [
            'email' => $request -> email,
            'password' => $request -> password,
        ];

        if (Auth::attempt($credential)) {
            $request->session()->regenerate();

            return redirect('dashboard/index');
        }

        return back()->with('error','email atau password salah');

    }


    public function singout(Request $request) {

        Auth::logout();
        $request->session()->invalidate();
         $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
