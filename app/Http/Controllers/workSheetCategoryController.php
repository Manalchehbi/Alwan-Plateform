<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\workSheetCategory;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use DB;

class workSheetCategoryController extends Controller
{
    // student add 
    public function formAdd()
    {
        $workSheetCategories=workSheetCategory::all();
        return view('workSheetCategories.workSheetCategory_add', compact('workSheetCategories'));
    }
    // student save
    public function formSave(Request $request)
    {
        
        $request->validate([
        'name'         =>   'required|string',
        'parent_id'         =>   'required|numeric',
    ]);
        $workSheetCategory = new workSheetCategory;
        $workSheetCategory->name = $request->input('name');
        $workSheetCategory->parent_id = $request->input('parent_id');
        $workSheetCategory->save();
        return redirect()->back()->with('success','workSheetCategory Added Successfully');
    }
   // all students 
   public function list()
   {
       $workSheetCategory = workSheetCategory::all();
      
       return view('workSheetCategories.workSheetCategory_all', compact('workSheetCategory'));
   }
 

   public function workSheetCategoryEdit($id)
   {
        $workSheetCategory = workSheetCategory::find($id);
        $workSheetCategories=workSheetCategory::all();
       return view('workSheetCategories.workSheetCategory_edit',compact('workSheetCategory','workSheetCategories'));
   }


    public function workSheetCategoryUpdate( Request $req)
    {

        $req->validate([
            'name'         =>   'required|string',
            'parent_id'         =>   'required|numeric',
        ]);
        $workSheetCategory = workSheetCategory::find($req->id);
        $workSheetCategory->name = $req->name;
        $workSheetCategory->parent_id = $req->parent_id;
        $workSheetCategory->save();
        $workSheetCategories=workSheetCategory::all();
        return redirect()->back()->with('success','workSheetCategory Updated Successfully')->with(compact('workSheetCategories'));
    }

   
    public function delete($id)
    {
        $workSheetCategory = workSheetCategory::find($id);
        $workSheetCategory->delete();
        return redirect()->back()->with('success','workSheetCategory deleted Successfully');
    }
   

}
