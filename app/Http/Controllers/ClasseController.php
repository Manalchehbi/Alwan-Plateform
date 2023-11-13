<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;
use App\Models\AcademicLevel;
use App\Models\School;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use DB;

class classeController extends Controller
{
    // student add 
    public function formAdd()
    {
        $academic_levels = AcademicLevel::all();
        $schools=School::all();
        return view('classes.classe_add', compact('academic_levels', 'schools'));
    }
    // student save
    public function formSave(Request $request)
    {
        $request->validate([
            'name'         =>   'required',
            'academic_level_id'        =>   'required|numeric',
            'school_id'     =>   'required|numeric'
        ]);

        $classe = new Classe;
        $classe->name = $request->input('name');
        $classe->academic_level_id = $request->input('academic_level_id');
        $classe->school_id = $request->input('school_id');
        $classe->save();
        return redirect()->back()->with('success','classe Added Successfully');
    }
   // all students 
   public function list()
   {
       $classe = Classe::all();
      
       return view('classes.classe_all', compact('classe'));
   }
   // student edit
   public function classeEdit($id)
   {
        $classe = Classe::find($id);
        $academic_levels = AcademicLevel::all();
        $schools=School::all();
       return view('classes.classe_edit',compact('classe','academic_levels','schools'));
   }
    // student update to db
    public function classeUpdate( Request $req)
    {
        $req->validate([
            'name'         =>   'required',
            'academic_level_id'        =>   'required|numeric',
            'school_id'     =>   'required|numeric'
        ]);
        
        $classe = Classe::find($req->id);
        $classe->name = $req->name;
        $classe->academic_level_id = $req->academic_level_id;
        $classe->school_id = $req->school_id;
        $classe->save();
        return redirect()->back()->with('success','classe Updated Successfully');
    }

    public function liststudent(Request $request){

       $request->get('name') ; 
       
    }
    public function delete($id)
    {
        $classe = Classe::find($id);
        $classe->delete();
        return redirect()->back()->with('success','classe deleted Successfully');
    }
   

}
