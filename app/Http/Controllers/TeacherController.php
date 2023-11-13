<?php

namespace App\Http\Controllers;

use App\Events\NewHomeworkEvent;
use App\Models\Classe;
use App\Models\School;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Stories;
use App\Models\UserPassword;
use App\Models\storyRead;
use App\Models\Speciality;
use Illuminate\Http\Request;
use App\Exports\TeachersExport;
use App\Imports\TeachersImport;
use App\Models\Exercise;
use App\Models\Homework;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Repositories\ScoreRepositoryInterface;
use App\Repositories\StoryReadRepositoryInterface;
use App\Services\FileUploadService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TeacherController extends Controller
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




    // teacher add 
    public function Addteacher()
    {
        return view('teachers.create_teacher');
    }
    public function addOneTeach()
    {

        $schools = School::all();
        return view('teachers.create_teacher', compact('schools'));
    }
    public function list()
    {
        $teacher = Teacher::all();

        return view('teachers.teachers_all', compact('teacher'));
    }
    public function insert(Request $request)
    {
        $request->validate([
            'first_name'         =>   'required|string',
            'last_name'         =>   'required|string',
            'adresse'         =>   'required|string',
            'gender'         =>   'required|string',
            'phone'         =>   'required',
            'picture'         =>   'nullable|file',
            'speciality_id'         =>   'required|numeric',
            'school_id'         =>   'required|numeric',
            'classe_id'         =>   'required',
            'classe_id.*'         =>   'numeric',
            'email'        =>   'required|email|unique:users',
        ]);
        $pass=Str::random(10);
        $user = new  User([
            "role_id" => 3,
            "name" =>  $request->input('first_name').' '.$request->input('last_name'),
            "email" => $request->input('email'),
            "password" => Hash::make('password'),
        ]);
        $user->save();

        $password =  new UserPassword([
            "user_id" => $user->id,
            "password" => $pass,
        ]);
        $password->save();

        $teacher =  new  teacher();
        $teacher->user_id = $user->id;
        $teacher->last_name = $request->input('last_name');
        $teacher->first_name = $request->input('first_name');
        $teacher->adresse = $request->input('adresse');
        $teacher->email = $request->input('email');
        $teacher->phone = $request->input('phone');
        $teacher->gender = $request->input('gender');
        $teacher->speciality_id = $request->input('speciality_id');

        
        $teacher->school_id = $request->input('school_id');
        if ($request->hasfile('picture')) {


            $file = $request->file('picture');
            $path = 'images/teachers/';
            $teacher->picture = (new FileUploadService)->upload($file, $path);
        }

        $teacher->save();
        $teacher->classes()->attach($request->input('classe_id'));
        return redirect()->back()->with('status', 'Teacher Added Successfully');
    }

    public function importTeachers()
    {
        return view('teachers.teacher_add');
    }

    public function uploadTeachers(Request $request)
    {
        Excel::import(new TeachersImport, $request->file);

        return redirect()->route('all/teacher/list')->with('success', 'Teacher Imported Successfully');
    }
    public function exportTeachers()
    {
        return Excel::download(new TeachersExport, 'teachers.xlsx');
    }
    public function listOfId()
    {

        $specialities = Speciality::all();

        $schools = School::all();

        $classes = Classe::all();

        return view('teachers.create_teacher', compact('specialities', 'schools', 'classes'));
    }

    public function edit($id)
    {
        $teacher = Teacher::find($id);
        $specialities = Speciality::all();
        $classes = Classe::all();
        $schools = School::all();
        return view('teachers.teacher_edit', compact('teacher', 'classes', 'specialities', 'schools'));
    }

    public function update(Request $request)
    {

        $request->validate([
            'first_name'         =>   'required|string',
            'last_name'         =>   'required|string',
            'adresse'         =>   'required|string',
            'gender'         =>   'required|string',
            'phone'         =>   'required',
            'picture'         =>   'nullable|file',
            'speciality_id'         =>   'required|numeric',
            'school_id'         =>   'required|numeric',
            'classe_id'         =>   'required',
            'classe_id.*'         =>   'numeric',
            'email'        =>   'required|email',
        ]);
        $teacher = Teacher::find($request->id);
        $teacher->last_name = $request->last_name;
        $teacher->first_name = $request->first_name;
        $teacher->adresse = $request->adresse;
        $teacher->email = $request->email;
        $teacher->phone = $request->phone;
        $teacher->gender = $request->gender;
        $teacher->speciality_id = $request->speciality_id;
        $teacher->school_id = $request->school_id;
       
        $teacher->classes()->sync($request->input('classe_id'));
        if ($request->hasfile('picture')) {



            $file = $request->file('picture');
            $path = 'images/teachers/';
            $teacher->picture = (new FileUploadService)->upload($file, $path);
        }

        $teacher->save();
        return redirect()->back()->with('status', 'Teacher Updated Successfully');
    }


    public function studentHomework(Request $request)
    {

        $teacher = $this->teacher;
        $classes = $teacher->classes->unique();
        $stories = Stories::paginate(1000);
        return view('teachers.homework', compact('classes', 'stories'));
    }

    public function sendHomework(Request $request)
    {

        
        $request->validate([
            'choice'         =>   'required|numeric',
            'story_id'         =>   'required|numeric',
        ]);
        $classe = Classe::findOrFail($request->choice);
        $story = Stories::findOrFail($request->story_id);
        $homework = new Homework();
        $homework->name = $story->name;
        $homework->archive = true;
        $homework->story_id = $story->id;
        $homework->classe_id = $classe->id;
        $homework->teacher_id = $this->teacher->id;
        $homework->save();
        try {
            event(new NewHomeworkEvent($homework));
        } catch (\Throwable $th) {
        }
        return redirect()->back()->with('success', 'Homework sent successfully');
    }






    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('teacher');
    }



    public function teacherload(Request $request)
    {



        $teacher = $this->teacher;
        $school = $teacher->school;
        $classes = $teacher->classes->unique();
        $academic_level_ids = $classes->pluck('academic_level_id')->unique()->toArray();
        
        
        $story = Stories::all();
        $class = $request->searchclasse;
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
    
        return view('teacher-page.teacher', compact("teacher", "classes","students", "class", "search_text", 'avg','nmberOfReadStoriesByStudent','avgReadStoriesByClass','avgStudentScoreByClassesAndExerciseType','avgAcademicLevelScoreByAcademicLevelsAndExerciseType'));
    }




    public function archieve(Request $request)
    {

       
        $teacher = $this->teacher;


        $homeworks = Homework::where('teacher_id', $teacher->id)->where('archive', 1)->orderBy('created_at', 'desc')->get();

        return view('teachers.homework_archieve', compact('homeworks'));
    }
    public function archieveDetail($id)
    {


        $user = Auth::user();

        $teacher = $this->teacher;

        $homework = Homework::findOrFail($id);
        $students = Student::where('classe_id', $homework->classe_id)->get();
        $student_ids = $students->pluck('id');

        $avgByStoryAndStudent = $this->scoreRepo->getAvgScoreByStudentIdAndStoryId($student_ids, $homework->story_id);
        $avgByExerciseType = $this->scoreRepo->getAvgScoreByStudentIdAndStoryIdGroupByExerciseType($student_ids, $homework->story_id);
        return view('teachers.homework_detail', compact('homework', 'students', 'avgByStoryAndStudent', 'avgByExerciseType'));
    }
    public function studentdetail($id)
    {

        $student = Student::findOrFail($id);

        $avg = $this->scoreRepo->getAvgScoreByStudentIdGroupByExerciseType([$id]);
        $stories = Stories::whereIn('id', storyRead::where('student_id', $student->id)->pluck('story_id'))->paginate(1000);

        return view('teacher-page.student_details', compact('student', 'stories', 'avg'));
    }


    public function editProfil($id)
    {
        $teacher = Teacher::find($id);

        return view('teacher-page.updatprof_teach', compact('teacher'));
    }

    public function updateProfil(Request $request)
    {
        $teacher = Teacher::find($request->id);
        if ($request->has('picture')) {

            $teacher->picture = $request->picture;
        }
        $teacher->save();

        if ($request->hasfile('picture')) {

            $file = $request->file('picture');
            $path = 'images/teachers/';
            $teacher->picture = (new FileUploadService)->upload($file, $path);
        }

        $teacher->save();
        return redirect()->route('teacher-page')->with('status', 'Teacher Picture Updated Successfully');
    }
    public function delete($id)
    {
        $teacher = Teacher::find($id);
        $teacher->delete();
        return redirect()->back()->with('success', 'teacher deleted Successfully');
    }


    public function comparisonChart()
    {
    }
}
