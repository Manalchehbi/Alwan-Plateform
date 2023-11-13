<?php

namespace App\Http\Controllers;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserPassword;

class AdminController extends Controller
{
    

    public function index()
    {
        return view('auth.admin');
    }

    public function handle()
    {
        $success = auth()->attempt([
            'email' => request('email'),
            'password' => request('password')
        ]) ;

        if($success) {
            return redirect()->to(RouteServiceProvider::HOME);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function getPasswords(){
        $passwords=UserPassword::all();
        return view ('auth.password',compact('passwords'));
    }
}
