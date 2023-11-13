<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use App\Models\Classe ;
use App\Models\Teacher ;
use App\Models\User ;
use App\Repositories\ExerciseRepository;
use App\Services\ExerciseService;
use App\Services\ExerciseServiceInterface;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Storage;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth', 'user-access:superAdmin'])->group(function () {
  
    
});
Route::middleware(['auth', 'user-access:school'])->group(function () {
  
    
});
Route::middleware(['auth', 'user-access:teacher'])->group(function () {
  
    
});
Route::middleware(['auth', 'user-access:student'])->group(function () {
  
    
});



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

        
Auth::routes();
        Route::get('/espace', function () {

            return view('auth.espace');
        })->name('espace');

//---------------------passwords-------------------------------------------//

Route::get('list/password',[App\Http\Controllers\AdminController::class,'getPasswords'])->name('list/password');
// -----------------------------login----------------------------------------//
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']   );


// Route for administration
Route::get('/admin',[App\Http\Controllers\AdminController::class , 'index'])->name('admin');
Route::post('/admin',[App\Http\Controllers\AdminController::class , 'handle'])->name('admin');
// ------------------------------ register ---------------------------------//
Route::get('/register', function() {
    return view('auth.register');
   })->name('register');

   Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'validate_registration'])->name('registration');
// ----------------------------- forget password ----------------------------//
Route::get('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'getEmail'])->name('forget-password');
Route::get('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'postEmail'])->name('forget-password');
// Route for administration
Route::get('/schoollogin',[App\Http\Controllers\SchoolLogController::class , 'index'])->name('schoollogin');
Route::post('/schoollogin',[App\Http\Controllers\SchoolLogController::class , 'handle'])->name('schoollog');
Route::get('/subscribe', function(){
    return view('accueil.subscribe');
});
Route::get('/stories', function(){
    return view('accueil.stories_info');
});

Route::get('/free-trial', function(){
    return view('accueil.free_trial');
});
Route::get('/', function () {
    return view('accueil.page_accueil');

});

        
        //Route for teachers 
        Route::get('/teacher', [App\Http\Controllers\TeacherLogController::class, 'index' ])->name('teacherlogin') ;
        Route::post('/teacher', [App\Http\Controllers\TeacherLogController::class,  'handle'])->name('teacherlog') ;
        Route::get('/index', function(){
            return view('accueil.page_accueil');
        });  
        
        // Route for students
        Route::get('/student',[App\Http\Controllers\StudentLogController::class , 'index'])->name('studentlogin') ;
        Route::post('/student',[App\Http\Controllers\StudentLogController::class , 'handle'])->name('studentlog');
    });  
Route::middleware(['auth'])->group(function () {
  
   

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ,'studentHasHomewrok']
    ], function(){
       

       

//Route for super_admin
//Route for teacher page
Route::get('/teacher-page',[\App\Http\Controllers\TeacherController::class ,'teacherload'])->name('teacher-page') ;
Route::get('/searchStudent',[\App\Http\Controllers\TeacherController::class ,'searchStudent'])->name('searchStudent') ;
    Route::get('logout', [\App\Http\Controllers\TeacherController::class ,'logout']);
    Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
    Route::get('/storiesguide', [\App\Http\Controllers\StoriesController::class ,'GetData'])->name('storiesguide');
    Route::get('/findStoryAcademic',[\App\Http\Controllers\StoriesController::class ,'GetAcademicData'])->name('findStoryAcademic');

  
   Route::get('/homework',[\App\Http\Controllers\TeacherController::class ,'studentHomework'])->name('homework');
   Route::post('/send-homework',[\App\Http\Controllers\TeacherController::class ,'sendHomework'])->name('sendHomework');
   Route::get('archieve-detail/{id}',[App\Http\Controllers\TeacherController::class,'archieveDetail'])->name('archieve-detail');
   
   Route::get('/search',[\App\Http\Controllers\StoriesController::class ,'searchData'])->name('search');
  
 Route::get('/useful_ressources',[\App\Http\Controllers\Useful_ressourceController::class ,'allUsefuls'])->name('useful_ressources');
 
 Route::get('/st',[\App\Http\Controllers\StudentController::class ,'studentload'])->name('st');
 Route::get('editProfilStudent/{id}',[\App\Http\Controllers\StudentController::class ,'editProfil'])->name('editProfilStudent/{id}');
 Route::post('/updatProfilStudent',[\App\Http\Controllers\StudentController::class ,'updateProfil'])->name('updatProfilStudent');
 
 Route::get('editProfilTeacher/{id}',[\App\Http\Controllers\TeacherController::class ,'editProfil'])->name('editProfilTeacher/{id}');
 Route::post('/updatProfil',[\App\Http\Controllers\TeacherController::class ,'updateProfil'])->name('updatProfil');

 Route::get('student_detail/{id}',[\App\Http\Controllers\TeacherController::class ,'studentdetail'])->name('student_detail/{id}');


Route::get('choice/{id}', [\App\Http\Controllers\StoriesController::class ,'storiesExercice'])->name('choice/{id}');
Route::get('/archieve',[\App\Http\Controllers\TeacherController::class ,'archieve'])->name('archieve');





Route::get('/mailbox',[\App\Http\Controllers\StudentController::class ,'mailBox'])->name('mailbox');

Route::get('/administration', [App\Http\Controllers\SchoolController::class, 'schoolload'])->name('administration');
Route::get('/statistiquebylevel',[App\Http\Controllers\SchoolController::class, 'columnchart'])->name('statistiquebylevel');
Route::get('teacherDetails/{id}',[App\Http\Controllers\SchoolController::class, 'schoolTeacher'])->name('teacherDetails/{id}');

Route::get('/statistiquebymonth', function(){
    return view('school-page.statistique_month');
});
Route::get('worksheets',[App\Http\Controllers\Work_papersController::class,'all'])->name('worksheets.all');



});




   
   
    Route::get('/story_detail',function(){
         return view('stories.story_detail');
    });
  



// ----------------------------- home dashboard ------------------------------//
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ----------------------------- students ----------------------------//
Route::get('add/student/new',[App\Http\Controllers\StudentController::class,'formAdd'])->name('add/student/new');
Route::get('new_student',[App\Http\Controllers\StudentController::class,'addOneStd'])->name('new_student');
Route::get('get-classe/{id}',[App\Http\Controllers\StudentController::class,'getClasse'])->name('get-classe/{id}');



Route::post('add/student/save',[App\Http\Controllers\StudentController::class,'addStudent'])->name('add/student/save');
Route::get('all/student/list',[App\Http\Controllers\StudentController::class,'list'])->name('all/student/list');
Route::get('edit-student/{id}',[App\Http\Controllers\StudentController::class,'edit'])->name('edit-student/{id}');
Route::put('update-student/{id}',[App\Http\Controllers\StudentController::class,'update'])->name('update-student/{id}');
Route::get('deleteStudent/{id}',[App\Http\Controllers\StudentController::class,'delete'])->name('deleteStudent/{id}');
// ----------------------------- teachers ----------------------------//
Route::get('add/teacher/new',[App\Http\Controllers\TeacherController::class,'Addteacher'])->name('add/teacher/new');
Route::get('new_teacher',[App\Http\Controllers\TeacherController::class,'listOfId'])->name('new_teacher');
Route::get('all/teacher/list',[App\Http\Controllers\TeacherController::class,'list'])->name('all/teacher/list');
Route::get('edit-teacher/{id}',[App\Http\Controllers\TeacherController::class,'edit'])->name('edit-teacher/{id}');
Route::post('update-teacher',[App\Http\Controllers\TeacherController::class,'update'])->name('update-teacher');
Route::get('all/speciality/list',[App\Http\Controllers\SpecialityController::class,'list'])->name('all/speciality/list');
Route::get('deleteTeacher/{id}',[App\Http\Controllers\TeacherController::class,'delete'])->name('deleteTeacher/{id}');

Route::post('insert-teacher',[App\Http\Controllers\TeacherController::class,'insert'])->name('insert-teacher');
// ----------------------------- stories ----------------------------//
Route::get('all/story/list',[App\Http\Controllers\StoriesController::class,'list'])->name('all/story/list');
Route::get('add/story/new',[App\Http\Controllers\StoriesController::class,'AddOneSt'])->name('add/story/new');

Route::post('insert-storie',[App\Http\Controllers\StoriesController::class,'addStorie'])->name('insert-storie');
Route::get('edit-story/{id}',[App\Http\Controllers\StoriesController::class,'edit'])->name('edit-story/{id}');
Route::put('update-story/{id}',[App\Http\Controllers\StoriesController::class,'update'])->name('update-story/{id}');
Route::get('story/read/{id}', [App\Http\Controllers\StoriesController::class,'storyRead'])->name('story.read');
Route::post('story/read-save', [App\Http\Controllers\StoriesController::class,'storyReadSave'])->name('story.read.save');
Route::get('deleteStory/{id}',[App\Http\Controllers\StoriesController::class,'delete'])->name('deleteStory/{id}');

//---------------------------------imports documents---------------------------------//
Route::get('/import-students', [App\Http\Controllers\StudentController::class, 'importStudents'])->name('import');
Route::post('/upload-students', [App\Http\Controllers\StudentController::class, 'uploadStudents'])->name('upload');
Route::get('/import-teachers', [App\Http\Controllers\TeacherController::class, 'importTeachers'])->name('import/teacher');
Route::post('/upload-teachers', [App\Http\Controllers\TeacherController::class, 'uploadTeachers'])->name('upload/teacher');
Route::get('/import-schools', [App\Http\Controllers\SchoolController::class, 'importSchools'])->name('import/school');
Route::post('/upload-schools', [App\Http\Controllers\SchoolController::class, 'uploadSchools'])->name('upload/school');
//-------------------------------exports documents----------------------------------//
Route::get('/export-students', [App\Http\Controllers\StudentController::class, 'exportStudents'])->name('export/students');
Route::get('/export-teachers', [App\Http\Controllers\TeacherController::class, 'exportTeachers'])->name('export/teachers');
Route::get('/export-schools', [App\Http\Controllers\SchoolController::class, 'exportSchools'])->name('export/schools');
// ----------------------------- schools ----------------------------//
Route::get('add/school/new',[App\Http\Controllers\SchoolController::class,'formAdd'])->name('add/school/new');
Route::get('all/school/list',[App\Http\Controllers\SchoolController::class,'list'])->name('all/school/list');
Route::post('save/school/new',[App\Http\Controllers\SchoolController::class,'formSave'])->name('save/school/new');
Route::get('school/edit/{id}', [App\Http\Controllers\SchoolController::class,'schoolEdit'])->name('school/edit/{id}');
Route::post('update/school', [App\Http\Controllers\SchoolController::class,'schoolUpdate'])->name('update/school');
Route::get('deleteSchool/{id}', [App\Http\Controllers\SchoolController::class,'delete'])->name('deleteSchool/{id}');
// ----------------------------- classes ----------------------------//
Route::get('add/classe/new',[App\Http\Controllers\ClasseController::class,'formAdd'])->name('add/classe/new');
Route::get('all/classe/list',[App\Http\Controllers\ClasseController::class,'list'])->name('all/classe/list');
Route::post('save/classe/new', [App\Http\Controllers\ClasseController::class,'formSave'])->name('save/classe/new');
Route::get('classe/edit/{id}', [App\Http\Controllers\ClasseController::class,'classeEdit'])->name('classe/edit/{id}');
Route::post('update/classe', [App\Http\Controllers\ClasseController::class,'classeUpdate'])->name('update/classe');
Route::get('deleteClasse/{id}', [App\Http\Controllers\ClasseController::class,'delete'])->name('deleteClasse/{id}');
// ----------------------------- workSheetCategories ----------------------------//
Route::get('add/workSheetCategory/new',[App\Http\Controllers\workSheetCategoryController::class,'formAdd'])->name('add/workSheetCategory/new');
Route::get('all/workSheetCategory/list',[App\Http\Controllers\workSheetCategoryController::class,'list'])->name('all/workSheetCategory/list');
Route::post('save/workSheetCategory/new', [App\Http\Controllers\workSheetCategoryController::class,'formSave'])->name('save/workSheetCategory/new');
Route::get('workSheetCategory/edit/{id}', [App\Http\Controllers\workSheetCategoryController::class,'workSheetCategoryEdit'])->name('workSheetCategory/edit/{id}');
Route::post('update/workSheetCategory', [App\Http\Controllers\workSheetCategoryController::class,'workSheetCategoryUpdate'])->name('update/workSheetCategory');
Route::get('deleteworkSheetCategory/{id}', [App\Http\Controllers\workSheetCategoryController::class,'delete'])->name('deleteworkSheetCategory/{id}');



// ----------------------------- Exercise ----------------------------//
Route::get('add/exercise/new',[App\Http\Controllers\ExerciseController::class,'formAdd'])->name('add/exercise/new');
Route::get('all/exercise/list',[App\Http\Controllers\ExerciseController::class,'list'])->name('all/exercise/list');
Route::post('save/newexercise', [App\Http\Controllers\ExerciseController::class,'formSave'])->name('save/newexercise');
Route::get('exercise/edit/{id}', [App\Http\Controllers\ExerciseController::class,'exerciseEdit'])->name('exercise/edit/{id}');
Route::post('update/exercise', [App\Http\Controllers\ExerciseController::class,'exerciseUpdate'])->name('update/exercise');
Route::get('exercise/take/{id}', [App\Http\Controllers\ExerciseController::class,'exerciseTake'])->name('exercise.take');
Route::post('exercise/take-save', [App\Http\Controllers\ExerciseController::class,'exerciseTakeSave'])->name('exercise.take.save');
Route::get('deleteExercise/{id}', [App\Http\Controllers\ExerciseController::class,'delete'])->name('deleteExercise/{id}');
// ----------------------------- worksheet ----------------------------//

Route::get('worksheets/add_worksheet',[App\Http\Controllers\Work_papersController::class,'formAdd'])->name('worksheets/add_worksheet');
Route::get('worksheets/All_worksheet',[App\Http\Controllers\Work_papersController::class,'formAll'])->name('worksheets/All_worksheet');
Route::post('insert-worksheet',[App\Http\Controllers\Work_papersController::class,'insert'])->name('insert-worksheet');
Route::get('deleteWorksheet/{id}',[App\Http\Controllers\Work_papersController::class,'delete'])->name('deleteWorksheet/{id}');

//------------------------------edit worksheeet----------------------------------------------------------------------------------//
Route::get('edit-work/{id}',[App\Http\Controllers\Work_papersController::class,'edit'])->name('edit-work/{id}');
Route::put('update-work/{id}',[App\Http\Controllers\Work_papersController::class,'update'])->name('update-work/{id}');
// ----------------------------- useful_ressources ----------------------------//
Route::get('usefuls/add_useful_ressources',[App\Http\Controllers\Useful_ressourceController::class,'formAdd'])->name('usefuls/add_useful_ressources');
Route::get('usefuls/All_useful_ressources',[App\Http\Controllers\Useful_ressourceController::class,'formall'])->name('usefuls/All_useful_ressources');
Route::post('insert-useful',[App\Http\Controllers\Useful_ressourceController::class,'insert'])->name('insert-useful');
Route::get('deleteUseful/{id]',[App\Http\Controllers\Useful_ressourceController::class,'delete'])->name('deleteUseful/{id}');
// -----------------------------  edit useful_ressources ----------------------------//
Route::get('edit-useful/{id}',[App\Http\Controllers\Useful_ressourceController::class,'edit'])->name('edit-useful/{id}');
Route::put('update-useful/{id}',[App\Http\Controllers\Useful_ressourceController::class,'update'])->name('update-useful/{id}');
//-----------------------------------------------------------------------------------------------//




Route::get('file_storage/{path}', function($path)
    { 
       
        if (Storage::exists($path)){
            return response()->file(Storage::path($path));
        }else{
            abort(404);
        }
       
    })->where('path', '.*')->name('filesystem');

Route::get('file_download/{path}', function($path)
    { 
       
        if (Storage::exists($path)){
            return response()->download(Storage::path($path));
        }else{
            abort(404);
        }
       
    })->where('path', '.*')->name('filesystem.download');

 
});
