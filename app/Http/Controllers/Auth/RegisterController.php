<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\School;
use App\Models\Student;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\UserPassword;
use App\Services\FileUploadService;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Stringable;

class RegisterController extends Controller
{
    function validate_registration(Request $request)
    {


        $request->validate([
            'name'         =>   'required',
            'email'        =>   'required|email|unique:users',
            //'password'     =>   'required|min:6'
        ]);

        $data = $request->all();
DB::transaction(function() use ($data)
{

    $pass=Str::random(10);
    $user = new User([
        'role_id' => 1,
        "name" => $data['name'],
        "email" => $data['email'],
        "is_freetrial" => true,
        'password' => Hash::make($pass)
       ]);
       $user->save();

       $password =  new UserPassword([
           "user_id" => $user->id,
           "password" => $pass,
       ]);
        $password->save();
        $student = new Student;
        $student->user_id = $user->id;
        $student->last_name = $data['name'];
        $student->first_name = $data['name'];
        $student->date_naissance = "2012-12-31";
        $student->phone = "06666666";
        $student->email = "demo@demo.com";
        $student->parentsName = "Jhon Doe, Jean Doe";
        $student->parentsMobileNumber = "066666666";
        $student->gender = "Male";
        $student->classe_id = Classe::where('name','Demo Class')->first()->id;
        $student->school_id = School::where('name','Demo School')->first()->id;
        $student->avatar = 'images/demos/student.png';

        $student->save();
});
       
        
        return  redirect()->back()->with('success', 'Registration Completed, now you can get your password from the link below');
    }
}
