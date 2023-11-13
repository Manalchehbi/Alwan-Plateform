<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\LoginController;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentLogController extends Controller
{


    public function index()
    {
        return view('auth.student');
    }
    public function handle(Request $request)
    {
        $success = auth()->attempt([
            'email' => request('email'),
            'password' => request('password')
        ]) ;

        if($success && auth::user()->isStudent()  ) {
            return redirect()->to('st');
        }
        (new LoginController)->logout($request);
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }}
