<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use Illuminate\Http\Request;

class specialityController extends Controller
{
       // all schools 
   public function list()
   {
       $specialities = Speciality::all();
      
       return view('teachers.speciality_all', compact('specialities'));
   }
}
