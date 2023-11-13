<?php

namespace App\Http\Controllers;

use App\Models\DifficultyLevel;
use App\Models\AcademicLevel;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Models\Stories;
use App\Models\Classe;
use App\Repositories\ScoreRepositoryInterface;
use App\Services\FileUploadService;
use App\Services\StoryServiceInterface;
use App\Services\ZipperService;
use Illuminate\Support\Facades\Auth;


class StoriesController extends Controller
{
    private $scoreRepo;
    private $storyService;

    public function __construct(StoryServiceInterface $storyService, ScoreRepositoryInterface $scoreRepository)
    {
        $this->scoreRepo = $scoreRepository;
        $this->storyService = $storyService;
    }


    public function formAdd()
    {
        return view('stories.story_add');
    }
    public function AddOneSt()
    {
        $types = Type::all();
        $academic_levels = AcademicLevel::all();
        $difficulty_levels = DifficultyLevel::all();


        return view('stories.story_add', compact('types', 'academic_levels', 'difficulty_levels'));
    }
    public function list()
    {

        $story = Stories::all();


        return view('stories.story_all', compact('story'));
    }

    public function addStorie(Request $request)
    {

        $request->validate([
            'name'         =>   'required',
            'description'         =>   'required',
            'difficulty_level_id.*'         =>   'numeric',    
            'academic_level_id.*'        =>   'numeric',
            'type_id.*'        =>   'numeric',
            'difficulty_level_id'         =>   'required',    
            'academic_level_id'        =>   'required',
            'type_id'        =>   'required',
            'picture'         =>   'required|file',
            'path'         =>   'required|file',
        ]);

        try {
            $this->storyService->saveStory($request);
            return redirect()->back()->with('status', 'Storie Added Successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }





    public function edit($id)
    {
        $stories = Stories::findOrFail($id);
        $types = Type::all();
        $academic_levels = AcademicLevel::all();
        $difficulty_levels = DifficultyLevel::all();
        return view('stories.story_edit', compact('stories', 'types', 'academic_levels', 'difficulty_levels'));
    }

    public function update(Request $request, $id)
    {
        ////

        $request->validate([
            'name'         =>   'required',
            'description'         =>   'required',
            'difficulty_level_id'         =>   'required',    
            'academic_level_id'        =>   'required',
            'type_id'        =>   'required',
            'difficulty_level_id.*'         =>   'numeric',    
            'academic_level_id.*'        =>   'numeric',
            'type_id.*'        =>   'numeric',
            'picture'         =>   'nullable|file',
            'path'         =>   'nullable|file',
        ]);
        $stories = Stories::findOrFail($id);
        $stories->name = $request->input('name');
        $stories->description = $request->input('description');
        $stories->difficulty_level_id = $request->input('difficulty_level_id');
        if($request->hasfile('picture')){

            $file=$request->file('picture');
            $path = 'images/stories';
            $stories->picture= (new FileUploadService)->upload($file,$path);
        }  
        if($request->hasfile('path')){

            $file=$request->file("path")->getRealPath();
            $path = 'stories/'.uniqid();
            (new ZipperService)->unzip($file,'app/'.$path);
            $stories->path= $path.'/index.html';
        } 

        $stories->types()->sync($request->input('type_id'));
        $stories->academic_levels()->sync($request->input('academic_level_id'));
        $stories->save();

        return redirect()->back()->with('status', 'Story Updated Successfully');
    }





    public function GetData(Request $request)
    {

        $academic = AcademicLevel::all();
        $difficulty = DifficultyLevel::all();
        $theme = Type::all();
        $acr = $request->acchoice;
        $dfc = $request->dfc;
        $tp = $request->tp;

            $story = Stories::when($dfc,
                function($query) use ($dfc) { 
                $query->where('difficulty_level_id', $dfc);
                
                })->when(
                $acr,
                function($query) use ($acr) { 
                $query->whereHas(
                    'academic_levels',
                    function ($q)  use ($acr) {
                        $q->where('academic_levels.id', $acr);
                    }
                );
                 } )->when(
                $tp,
                function($query) use ($tp) { 
                $query->whereHas('types', function ($q) use ($tp) {
                    $q->where('types.id', $tp);
                });}
            )->paginate(1000);
      
       
        return view('storiesguide', compact('story', 'acr', 'academic', 'difficulty', 'dfc', 'theme', 'tp'));
    }

    public function searchData(Request $request)
    {
        $classes = Classe::all();
        
        $search_text = $request->searchQuery;
        $stories = Stories::where('name', 'LIKE', '%' . $search_text . '%')->paginate(6);
        return view('teachers.homework', compact('classes', 'stories'));
    }

    public function storiesExercice($id)
    {
        $story = Stories::findOrFail($id);
        
        if (Auth::user()->isStudent()) {

            $avg = $this->scoreRepo->getStudentAvgScoreByStudentIdAndStoryId([Auth::user()->student->id], $story->id);

            return view('stories.stories_exercise', compact('story', 'avg'));
        }
        return view('stories.stories_exercise', compact('story'));
    }
    // take exercise
    public function storyRead($id)
    {
        return  $this->storyService->readStory($id);
    }



    // save exercise take
    public function storyReadSave(Request $request)
    {
        return  $this->storyService->saveStoryRead($request->all());
    }
    
    public function delete($id)
    {
        $story = Stories::find($id);
        $story->delete();
        return redirect()->back()->with('success','story deleted Successfully');
    }
}
