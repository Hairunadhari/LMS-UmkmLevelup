<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
// use Session;

class LoginController extends Controller
{
  
    protected function authenticated(Request $request, $user)
    {
        return redirect()->route('home'); // Replace 'home' with the desired route after login
    }
    
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        if (Auth::check()) {
            return redirect()->intended('home');
        }
        $request->session()->forget('alert');
        return view('login');
    }

    public function submitLogin(Request $request)
    {
        // dd('test');
        if (Auth::check()) {
            return redirect()->route('home');
        }
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $credentials['aktif'] = 1;
        $user = User::where('email', $credentials['email'])->first();

        try {
            if (!$user) {
                throw new \Exception('Tidak menemukan akun dengan email '.$request['email'].'.');
            }

            if (!$user->email_verified_at) {
                throw new \Exception('Email belum diverifikasi.');
            }

            if (Auth::attempt($credentials, $request->remember)) {
                $request->session()->regenerate();
    
                return redirect()->route('home'); 
            }else{
                throw new \Exception('Maaf password anda salah');
            }
          
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',[
                'type'=>'error',
                'message'=> $th->getMessage(),   
            ]);
        }
        
        return redirect('/home');

        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ]);
    }
}
