<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exercise;
use App\Models\ExerciseType;
use App\Models\Stories;
use App\Services\ExerciseServiceInterface;
use Brian2694\Toastr\Facades\Toastr;
use App\Services\FileUploadService;
use App\Services\ZipperService;
use Carbon\Carbon;
use DB;

class ExerciseController extends Controller
{     

    private $exerciseService;

    public function __construct(ExerciseServiceInterface $exerciseService)
    {
        $this->exerciseService = $exerciseService;
    } 


    // student add 
    public function formAdd()
    {
        $stories=Stories::all();
        $types=ExerciseType::all();
        return view('exercises.add_exercise',compact('stories','types'));
    }
    // student save
    public function formSave(Request $request)
    {
        $request->validate([
            'name'         =>   'required',
            'story_id'        =>   'required|numeric',
            'type_id'     =>   'required|numeric',
            'picture'     =>   'required|file'
        ]);
        $this->exerciseService->saveExercise($request);
        return redirect()->back()->with('status','Exercise Added Successfully');
    }
   // all students 
   public function list()
   {
       $exercise = Exercise::all();
      
       return view('exercises.all_exercises', compact('exercise'));
   }
   // student edit
   public function exerciseEdit($id)
   {
        $exercise = Exercise::find($id);
        $stories=Stories::all();
        $types=ExerciseType::all();
       return view('exercises.updat_exercise',compact('exercise','stories','types'));
   }
    // student update to db
    public function exerciseUpdate(Request $request)
    {
        $request->validate([
            'name'         =>   'required',
            'story_id'        =>   'required|numeric',
            'type_id'     =>   'required|numeric',
            'picture'     =>   'nullable|file'
        ]);
        $exercise = Exercise::findOrFail($request->id);
        $exercise->name = $request->input('name');
        $exercise->story_id = $request->input('story_id');
        $exercise->exetype_id  = $request->input('type_id');
        if($request->hasfile('picture')){

            $file=$request->file('picture');
            $path = 'images/exercises';
            $exercise->picture = (new FileUploadService)->upload($file,$path);
        }  
        if($request->hasfile('path')){

            $file=$request->file("path")->getRealPath();
            $path = 'exercises/'.uniqid();
            (new ZipperService)->unzip($file,'app/'.$path);
            $exercise->path = $path.'/index.html';
        }
        
        $exercise->save();
        return redirect()->route('all/exercise/list');
    }
   
   // take exercise
   public function exerciseTake($id)
   {
       return  $this->exerciseService->takeExercise($id);
   }


   
   // save exercise take
   public function exerciseTakeSave(Request $request)
   {
       return  $this->exerciseService->saveExerciseTake($request->all());
   }

   public function delete($id)
    {
        $exercise = Exercise::find($id);
        $exercise->delete();
        return redirect()->back()->with('success','exercise deleted Successfully');
    }

}
