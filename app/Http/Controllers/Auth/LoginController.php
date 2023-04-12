<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Session;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        try {
            if (Auth::attempt($credentials, $request->remember)) {
                $request->session()->regenerate();
    
                return redirect()->intended('home');
            }
            
            $request->session()->flash('alert', [
                'type' => 'error',
                'message' => 'Email / Password anda salah.',
            ]);
            $request->session()->put('id_user', Auth::user()->id);
        } catch (\Throwable $th) {
            $request->session()->flash('alert', [
                'type' => 'error',
                'message' => 'Silahkan periksa kembali email password anda.',
            ]);
        }
        
        return view('login');

        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ]);
    }
}
