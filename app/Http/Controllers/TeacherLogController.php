<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\LoginController;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


use Illuminate\Support\Facades\Session as FacadesSession;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherLogController extends Controller
{


       public function index()
    {
        return view('auth.teacher');
    }

    public function handle(Request $request)
    {
        $success = auth()->attempt([
            'email' => request('email'),
            'password' => request('password')
        ]) ;

        if($success && auth::user()->isTeacher()) {
            return redirect()->to('teacher-page');
        }
        (new LoginController)->logout($request);
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

}
