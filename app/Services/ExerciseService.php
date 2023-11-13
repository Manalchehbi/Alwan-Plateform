<?php


namespace App\Services;

use App\Repositories\ExerciseRepositoryInterface;
use App\Repositories\ScoreRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Constraint\IsTrue;
use Symfony\Component\HttpKernel\Event\FinishRequestEvent;

class ExerciseService implements ExerciseServiceInterface
{

  private $exerciseRepo;
  private $scoreRepo;
  public function __construct(ExerciseRepositoryInterface $exerciseRepository,ScoreRepositoryInterface $scoreRepository)
  {
    $this->exerciseRepo = $exerciseRepository;
    $this->scoreRepo = $scoreRepository;
  }

  public function saveExercise($request)
  {
    $data = $request->only([
      'name',
      'story_id',
      'type_id',
    ]);
    $data['picture'] = '';
    $data['path'] = '';
    if($request->hasfile('picture')){

      $file=$request->file('picture');
      $path = 'images/exercises';
      $data['picture'] = (new FileUploadService)->upload($file,$path);
    } 
    if ($request->hasfile('path')) {

      $file = $request->file("path")->getRealPath();
      $path = 'exercises/' . uniqid();
      (new ZipperService)->unzip($file, 'app/' . $path);
      $data['path'] = $path . '/index.html';
    }
    //dd($data);
    $this->exerciseRepo->save($data);


    return true;
  }

  public function takeExercise($id)
  {
    $exercise = $this->exerciseRepo->findOrFail($id);


    return response()->redirectTo("file_storage/" . $exercise->path . "?story_id=" . $exercise->story_id . "&exercise_id=" . $id . "&token=" . csrf_token());
  }
  public function saveExerciseTake($data)
  {
    (isset($data['score'][0])) ?  $teacher = $data['score'][0] : $teacher = "";
    (isset($data['score'][1])) ?  $student = $data['score'][1] : $student = "";
    (isset($data['exercise_id'])) ?  $exercise_id = $data['exercise_id'] : $exercise_id = "";
    (isset($data['finished'])) ?  $finished = $data['finished'] : $finished = "";
   
 

     if(Auth::user()->student!=null){

    $score = $this->scoreRepo->findByExerciseIdAndStudentId($data['exercise_id'],Auth::user()->student->id);
    $_data = array(
      'score_student' => $student,
      'score_teacher' => $teacher,
    );
    if ($score->isEmpty()) {
     
      $_data['exercise_id']=  $exercise_id;
      
    $this->scoreRepo->save($_data);
    }else{
      
      if($finished=="true"){
        
        $repitition = $score->first()->repitition +1;
        $_data['repitition']=  $repitition;
      }
      
      $this->scoreRepo->update($_data,$score->first()->id);
    
    }
    
    
  }
  return response($data);
  }
       
      
      



  public function findOrFail($id)
  {

    return $this->exerciseRepo->findOrFail($id);
  }
}
