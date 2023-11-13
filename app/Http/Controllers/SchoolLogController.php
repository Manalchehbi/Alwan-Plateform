<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\LoginController;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;




use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchoolLogController extends Controller
{
    

    public function index()
    {
        return view('auth.school');
    }

    public function handle(Request $request)
    {
        $success = auth()->attempt([
            'email' => request('email'),
            'password' => request('password')
        ]) ;

        if($success && auth::user()->isSchool()) {
            return redirect()->to('administration');
        }
        (new LoginController)->logout($request);
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
