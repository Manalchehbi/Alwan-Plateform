<?php

namespace App\Http\Controllers;
use App\Exports\SchoolsExport;
use App\Imports\SchoolsImport;
use App\Http\Controllers\classeController ;
use App\Models\Classe;
use App\Models\School;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Stories;
use App\Models\UserPassword;
use App\Models\storyRead;
use App\Models\Speciality;
use Illuminate\Http\Request;
use App\Models\Exercise;
use App\Models\Homework;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
Use App\Models\User ;
use App\Repositories\ScoreRepositoryInterface;
use App\Repositories\StoryReadRepositoryInterface;
use App\Services\FileUploadService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SchoolController extends Controller
{

    
    private $scoreRepo;
    private $teacher;
    private $storyReadRepo;

    public function __construct(ScoreRepositoryInterface $scoreRepository,StoryReadRepositoryInterface $storyReadRepository)
    {
        $this->scoreRepo = $scoreRepository;
        $this->storyReadRepo = $storyReadRepository;
        $this->middleware(function($request,$next){
            if (session('actingAsATeacher')) {

                $this->teacher = Teacher::findOrFail(session('teacher_id'));
            } elseif(!Auth::user()->isTeacher()){
                
                $this->teacher = null;
            }else {
    
                $this->teacher = Auth::user()->teacher;
            }
           return $next($request);
                });
       
    }





    // school add 
    public function formAdd()
    {
        return view('school.create_school');
    }
    // school save
    public function formSave(Request $request)
    {
        $request->validate([
            'name'         =>   'required',
            'adresse'         =>   'required',
            'phone'         =>   'required',
            'logo'         =>   'nullable|file',
            'email'        =>   'required|email|unique:users'
        ]);
        $pass=Str::random(10);
        $user = new  User([
            "role_id" => 4,
            "name" => $request->input('name'),
            "email" => $request->input('email'),
            "password" => Hash::make('password'),
        ]);
        $user->save();
        $password =  new UserPassword([
            "user_id" => $user->id,
            "password" => $pass,
        ]);
        $password->save();
        $school = new School;
        $school->user_id = $user->id;
        $school->name = $request->input('name');
        if($request->hasfile('logo')){

            $file=$request->file('logo');
            $extention =$file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('images/schools/',$filename);
            $school->logo=$filename;
        }
        $school->adresse = $request->input('adresse');
        $school->phone = $request->input('phone');
        $school->email = $request->input('email');
        $school->save();
        return redirect()->back()->with('status','school Added Successfully');
    }
   // all schools 
   public function list()
   {
       $school = School::all();
      
       return view('school.school_all', compact('school'));
   }
    public function importSchools()
    {
        return view('school.school_add');
    }

    public function uploadSchools(Request $request)
    {
   
        Excel::import(new SchoolsImport, $request->file);
        
        return redirect()->route('all/school/list')->with('success', 'School Imported Successfully');
    }

    public function exportSchools() 
    {
        return Excel::download(new SchoolsExport, 'schools.xlsx');
    }

    // student edit
   public function schoolEdit($id)
   {
        $school = School::find($id);
       return view('school.school_edit',compact('school'));
   }
    // student update to db
    public function schoolUpdate( Request $req)
    {

        $req->validate([
            'name'         =>   'required',
            'adresse'         =>   'required',
            'phone'         =>   'required',
            'logo'         =>   'nullable|file',
            'email'        =>   'required|email',
        ]);
        $school = School::find($req->id);
        $school->name = $req->name;
        if($req->hasfile('logo')){

            $file=$req->file('logo');
            $extention =$file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('images/schools/',$filename);
            $school->logo=$filename;
        }
        $school->adresse = $req->adresse;
        $school->phone = $req->phone;
        $school->email = $req->email;
       // $school->password = decrypt($req->password);
        
        $school->save();
        return redirect()->route('all/school/list');
    }



    public function schoolload(){
        $user = Auth::user();

        $school = $user->school; 
       return view('school-page.school',compact('school'));

    }


    public function columnchart(){

        return view('school-page.statistique_level');

    }

    public function delete($id)
    {
        $school = School::find($id);
        $school->delete();
        return redirect()->back()->with('success','school deleted Successfully');
    }

    public function schoolTeacher(Request $request, $id){
        $request->session()->put('actingAsATeacher', true);
        $request->session()->put('teacher_id', $id);
        $teacher =Teacher::findOrFail($id) ;
        $school = $teacher->school;
        $classes = $teacher->classes->unique();
       
        $academic_level_ids = $classes->pluck('academic_level_id')->unique()->toArray();
        
        $story= Stories::all();
        $class=$request->searchclasse;
        $search_text = $request->searchQuery;
        $full_name = explode(" ",$search_text);
        $first_name = isset($full_name[0])?$full_name[0]:null;
        $last_name = isset($full_name[1])?$full_name[1]:null;



       
        $students = Student::whereIn('classe_id',$classes->pluck('id')->toArray())->where(function ($query) use ($class,$first_name,$last_name) {$query->when(
            $class,
            function ($query) use ($class) {
                $query->where('classe_id', $class);
            }
        )->when(
            $first_name,
            function ($query) use ($first_name) {
                $query->where('first_name', 'LIKE', '%' . $first_name . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $first_name . '%');
            }
        )->when(
            $last_name,
            function ($query) use ($last_name) {
                $query->where('last_name', 'LIKE', '%' . $last_name . '%')
                    ->orWhere('first_name', 'LIKE', '%' . $last_name . '%');
            }
        );})->orWhere('id','-1')->paginate(1000);


        

            
       
        $student_ids = $students->pluck('id')->toArray();

         $avg = $this->scoreRepo->getAvgScoreByStudentIdGroupByExerciseType($student_ids);
 
         $nmberOfReadStoriesByStudent = $this->storyReadRepo->getNumberOfReadStoriesGroupByStudentId($classes->pluck('id')->toArray());
         $avgReadStoriesByClass = $this->storyReadRepo->getAvgReadStoriesByClassIds($classes->pluck('id')->toArray());
         
         $avgStudentScoreByClassesAndExerciseType = $this->scoreRepo->getAvgScoreByClassIdsAndByExerciseTypeGroupByStudentId(1,$classes->pluck('id')->toArray());
         #$avgClassScoreByClassesAndExerciseType = $this->scoreRepo->getAvgScoreByClassIdsAndByExerciseTypeGroupByStudentIdAndClassIds(1,$classes->pluck('id')->toArray());
         $avgAcademicLevelScoreByAcademicLevelsAndExerciseType = $this->scoreRepo->getAvgScoreByAcademicLevelIdsAndByExerciseTypeAndSchoolIdGroupByStudentIdAndAcademicLevelIds(1,$school->id,$academic_level_ids);
         #dd($avgAcademicLevelScoreByAcademicLevelsAndExerciseType);
         #dd($avgReadStoriesByClass);
        #showStats({{$nmberOfReadStoriesByStudent->find($student->id)->nbReadStories
     
         return view('teacher-page.teacher', compact("teacher", "classes", "students", "class", "search_text", 'avg','nmberOfReadStoriesByStudent','avgReadStoriesByClass','avgStudentScoreByClassesAndExerciseType','avgAcademicLevelScoreByAcademicLevelsAndExerciseType'));
          }
    
}
