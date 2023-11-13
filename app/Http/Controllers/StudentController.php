<?php

namespace App\Http\Controllers;
use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StoryRead;
use App\Models\User;
use App\Models\Stories; 
use App\Models\Homework; 
use App\Models\Classe;
use App\Models\UserPassword;
use App\Models\Exercise;
use App\Models\School;
use App\Models\Score;
use App\Repositories\ScoreRepositoryInterface;
use Maatwebsite\Excel\Facades\Excel;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use App\Services\FileUploadService;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Str;
class StudentController extends Controller
{

   
    private $scoreRepo;
    public function __construct(ScoreRepositoryInterface $scoreRepository)
    {
      $this->scoreRepo = $scoreRepository;
    }



    // student add 
   
    public function formAdd()
    {
        return view('students.create_student');
    }
    public function addOneStd(Request $request)
    {    $schools=School::all();
         
        return view('students.create_student', compact('schools'));
    }

    public function getClasse($school_id){
        $classes=Classe::where('school_id',$school_id)->get();
        return response()->json(['classes' => $classes]);
    }
   
   // all students 
   public function list()
   {
       $student = Student::all();
      
       return view('students.students_all', compact('student'));
   }
    // student save
    public function addStudent(Request $request)
    {
       
        $request->validate([
            'first_name'         =>   'required|string',
            'last_name'         =>   'required|string',
            'parentsName'         =>   'required|string',
            'gender'         =>   'required|string',
            'parentsMobileNumber'         =>   'required|string',
            'date_naissance'         =>   'required',
            'phone'         =>   'required',
            'avatar'         =>   'required|file',
            'classe_id'         =>   'required|numeric',
            'school_id'         =>   'required|numeric',
            'email'        =>   'required|email|unique:users',
        ]);
        $pass=Str::random(10);
        
        $user = new  User([
            "role_id" => 1,
            "name" => $request->input('first_name').' '.$request->input('last_name'),
            "email" => $request->input('email'),
            "is_freetrial"=>false,
            "password" => Hash::make($pass),
        ]);

        $user->save();

        $password =  new UserPassword([
            "user_id" => $user->id,
            "password" => $pass,
        ]);
        $password->save();

        $student = new Student;
        $student->user_id = $user->id;
        $student->last_name = $request->input('last_name');
        $student->first_name = $request->input('first_name');
        $student->date_naissance = $request->input('date_naissance');
        $student->phone = $request->input('phone');
        $student->email = $request->input('email');
        $student->parentsName = $request->input('parentsName');
        $student->parentsMobileNumber = $request->input('parentsMobileNumber');
        $student->gender = $request->input('gender');
        $student->classe_id = $request->input('classe_id');
        $student->school_id = $request->input('school_id');
        if($request->hasfile('avatar')){

            $file=$request->file('avatar');

            $path = 'images/students/';

            $student->avatar = (new FileUploadService)->upload($file, $path);
        }
        $student->save();
        return redirect()->back()->with('status','Student Added Successfully');
    }

   
    public function importStudents()
    {
        return view('students.students_add');
    }

    public function uploadStudents(Request $request)
    {
        Excel::import(new StudentsImport, $request->file);
        
        return redirect()->route('all/student/list')->with('success', 'Student Imported Successfully');
    }

    public function exportStudents() 
    {
        return Excel::download(new StudentsExport, 'students.xlsx');
    }
    public function data()
    {
        $classes=Classe::all();
        $schools=School::all();
        return view('students.students_edit', compact('classes','schools'));
    }

    public function edit($id)
    {
        $students = Student::find($id);
        $classes = Classe::all();
        $schools=School::all();
        return view('students.students_edit', compact('students','classes','schools'));
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name'         =>   'required|string',
            'last_name'         =>   'required|string',
            'parentsName'         =>   'required|string',
            'gender'         =>   'required|string',
            'parentsMobileNumber'         =>   'required|string',
            'date_naissance'         =>   'required',
            'phone'         =>   'required',
            'avatar'         =>   'nullable|file',
            'classe_id'         =>   'required|numeric',
            'school_id'         =>   'required|numeric',
            'email'        =>   'required|email',
        ]);
        $student = Student::find($id);
        $student->last_name = $request->input('last_name');
        $student->first_name = $request->input('first_name');
        $student->date_naissance = $request->input('date_naissance');
        $student->phone = $request->input('phone');
        $student->email = $request->input('email');
        $student->parentsName = $request->input('parentsName');
        $student->parentsMobileNumber = $request->input('parentsMobileNumber');
        $student->gender = $request->input('gender');
        $student->classe_id = $request->input('classe_id');
        $student->school_id = $request->input('school_id');
        if($request->hasfile('avatar')){

            $file=$request->file('avatar');
            $path = 'images/students/';
            $student->avatar = (new FileUploadService)->upload($file, $path);
        }
       
        $student->update();
        return redirect()->back()->with('status','Student Updated Successfully');
    }
    public function studentload(){

      
        $user = Auth::user();

        $student = $user->student; 

        $stories = Stories::whereIn('id',StoryRead::where('student_id',$student->id)->get('story_id'))->orWhereIn('id',Exercise::whereIn('id',Score::where('student_id',$student->id)->get('exercise_id'))->get('story_id'))->paginate(1000); 
        $scores = $this->scoreRepo->findByStudentId($student->id);
        $avgStudentScore = $scores->avg('score_student');
        $avg = $this->scoreRepo->getAvgScoreByStudentIdGroupByStoryId([$student->id]);
        
        
   return view('student-page.student',compact('student','stories','avg','avgStudentScore'));


   }

   public function mailBox(Request $request){
      
    $user = Auth::user();

    $student = $user->student;
    
    $homeworks = Homework::where('classe_id',$student->classe_id)->orderBy('created_at','desc')->get();
  
    return view('student-page.mail_box',compact('homeworks'));



   }
   public function editProfil($id)
 {
     $student = Student::find($id);
     
     return view('student-page.updatprofil_stud', compact('student'));
 }

 public function updateProfil(Request $request)
 {
     $student = Student::find($request->id);

     if($request->has('avatar')){
 
        $student->avatar=$request->avatar;
     }
         $student->save();
   
     if($request->hasfile('avatar')){

        $file=$request->file('avatar');

        $path = 'images/students/';

        $student->avatar = (new FileUploadService)->upload($file, $path);
     }
    
     $student->save();
     return redirect()->route('st')->with('status','student Picture Updated Successfully');
 }
    

 public function delete($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->back()->with('success','student deleted Successfully');
    }

}
