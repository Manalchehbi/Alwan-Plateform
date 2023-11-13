<?php


namespace App\Repositories;

use App\Models\Score;
use App\Models\Student;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ScoreRepository implements ScoreRepositoryInterface
{


   public function save($data)
   {

      $score = new Score;
      $score->score_student = $data['score_student'];
      $score->score_teacher = $data['score_teacher'];
      $score->student_id = Auth::user()->student->id;
      $score->exercise_id = $data['exercise_id'];
      $score->repitition = -1;
      $score->save();

      return true;
   }
   public function update($data, $id)
   {

      $score = Score::findOrFail($id);
      $score->score_student = $data['score_student'];
      $score->score_teacher = $data['score_teacher'];
      if (isset($data['repitition'])) {
         $score->repitition = $data['repitition'];
      }
      $score->save();

      return true;
   }

   public function findOrFail($id)
   {
      return Score::findOrFail($id);
   }

   public function findByExerciseIdAndStudentId($exercise_id, $student_id)
   {
      return Score::where("exercise_id", $exercise_id)->where("student_id", $student_id)->get();
   }
   public function findByStudentId($student_id)
   {
      return Score::where("student_id", $student_id)->get();
   }

   public function getAvgScoreByStudentIdGroupByStoryId($student_ids)
   {
      $students = Student::whereIn('id', $student_ids)->get();

      $average = new Collection();
      foreach ($students as $student) {
         foreach ($student->scores as $score) {
            
            if($average->where('story_id', $score->exercise->story_id )->first()==null){
               
               $average = $average->push(DB::select(DB::raw("SELECT $student->id as student_id, story_id,
               AVG(avgTypeScore) as avgStoryScore FROM (SELECT exercises.exetype_id as
               exetype_id, COALESCE(story_id," . $score->exercise->story_id . ") 
               as story_id,AVG(COALESCE(score_student,0)) as avgTypeScore FROM (SELECT  exercises.id,exercises.story_id,
                exercises.exetype_id, scores.score_id,scores.score_student,scores.
                student_id,scores.exercise_id,scores.score_teacher FROM exercises 
                 LEFT JOIN ( SELECT scores.id as score_id,scores.score_student,
                 scores.student_id,scores.exercise_id,scores.score_teacher FROM 
                 exercises LEFT JOIN scores ON scores.exercise_id = exercises.id 
                 WHERE scores.student_id = $student->id) as scores ON scores.exercise_id 
                 = exercises.id  where story_id = " . $score->exercise->story_id . ") as 
                 exercises GROUP 
              BY exetype_id) as avgTypeScoreRes GROUP BY story_id"))[0]);
   
              
            }
            
            
            
         }
      }
      
      return $average;
   }


   public function getAvgScoreByStudentIdGroupByExerciseType($student_ids)
   {

      $students = Student::whereIn('id', $student_ids)->get();

      $average = new Collection();
      foreach ($students as $student) {
         foreach ($student->scores as $score) {
            $avgs =DB::select(DB::raw("SELECT  $student->id as student_id, exercises.exetype_id as
            exetype_id, COALESCE(story_id," . $score->exercise->story_id . ") 
            as story_id,AVG(COALESCE(score_teacher,0)) as avgTypeScore FROM
             (SELECT  exercises.id,exercises.story_id, exercises.exetype_id, scores.score_id,scores.score_student,scores.
             student_id,scores.exercise_id,scores.score_teacher FROM exercises 
              LEFT JOIN ( SELECT scores.id as score_id,scores.score_student,
              scores.student_id,scores.exercise_id,scores.score_teacher FROM 
              exercises LEFT JOIN scores ON scores.exercise_id = exercises.id 
              WHERE scores.student_id = $student->id) as scores ON scores.exercise_id 
              = exercises.id  where story_id = " . $score->exercise->story_id . ") as 
              exercises GROUP 
           BY exetype_id"));
           
         //    $avgs =DB::select(DB::raw("SELECT  $student->id as student_id, exercise_types.id as
         //    exetype_id, COALESCE(story_id," . $score->exercise->story_id . ") 
         //    as story_id,AVG(COALESCE(score_teacher,0)) as avgTypeScore FROM
         //     exercise_types LEFT JOIN (SELECT  exercises.id,exercises.story_id,
         //     exercises.exetype_id, scores.score_id,scores.score_student,scores.
         //     student_id,scores.exercise_id,scores.score_teacher FROM exercises 
         //      LEFT JOIN ( SELECT scores.id as score_id,scores.score_student,
         //      scores.student_id,scores.exercise_id,scores.score_teacher FROM 
         //      exercises LEFT JOIN scores ON scores.exercise_id = exercises.id 
         //      WHERE scores.student_id = $student->id) as scores ON scores.exercise_id 
         //      = exercises.id  where story_id = " . $score->exercise->story_id . ") as 
         //      exercises ON exercises.exetype_id = exercise_types.id GROUP 
         //   BY exercise_types.id"));
          
           foreach ($avgs as  $avg) {
            
            $average = $average->push($avg);
           }
         }
      }
      $average = $average->groupBy('exetype_id');
      return $average;
     }

   public function getAvgScoreByStudentIdAndStoryIdGroupByExerciseType($student_ids,$story_id)
   {

      $students = Student::whereIn('id', $student_ids)->get();

      $average = new Collection();
      foreach ($students as $student) {
            $avgs =DB::select(DB::raw("SELECT  $student->id as student_id, exercises.exetype_id as
            exetype_id, COALESCE(story_id," . $story_id . ") 
            as story_id,AVG(COALESCE(score_teacher,0)) as avgTypeScore FROM
             (SELECT  exercises.id,exercises.story_id, exercises.exetype_id, scores.score_id,scores.score_student,scores.
             student_id,scores.exercise_id,scores.score_teacher FROM exercises 
              LEFT JOIN ( SELECT scores.id as score_id,scores.score_student,
              scores.student_id,scores.exercise_id,scores.score_teacher FROM 
              exercises LEFT JOIN scores ON scores.exercise_id = exercises.id 
              WHERE scores.student_id = $student->id) as scores ON scores.exercise_id 
              = exercises.id  where story_id = " . $story_id . ") as 
              exercises GROUP 
           BY exetype_id"));
           
         //    $avgs =DB::select(DB::raw("SELECT  $student->id as student_id, exercise_types.id as
         //    exetype_id, COALESCE(story_id," . $score->exercise->story_id . ") 
         //    as story_id,AVG(COALESCE(score_teacher,0)) as avgTypeScore FROM
         //     exercise_types LEFT JOIN (SELECT  exercises.id,exercises.story_id,
         //     exercises.exetype_id, scores.score_id,scores.score_student,scores.
         //     student_id,scores.exercise_id,scores.score_teacher FROM exercises 
         //      LEFT JOIN ( SELECT scores.id as score_id,scores.score_student,
         //      scores.student_id,scores.exercise_id,scores.score_teacher FROM 
         //      exercises LEFT JOIN scores ON scores.exercise_id = exercises.id 
         //      WHERE scores.student_id = $student->id) as scores ON scores.exercise_id 
         //      = exercises.id  where story_id = " . $score->exercise->story_id . ") as 
         //      exercises ON exercises.exetype_id = exercise_types.id GROUP 
         //   BY exercise_types.id"));
          
           foreach ($avgs as  $avg) {
            
            $average = $average->push($avg);
           }
         
      }
      //$average = $average->groupBy('exetype_id');
      return $average;
     }


   public function getAvgScoreGroupByExerciseType()
   {

      return collect(DB::select(DB::raw("SELECT exetype_id,student_id,AVG(score_student) as avg FROM `scores` LEFT JOIN exercises ON scores.exercise_id = exercises.id GROUP by exetype_id")));
   }

   public function getAvgScoreByStudentIdAndStoryId($student_ids, $story_id)
   {
      
      $average = new Collection();
      foreach ($student_ids as $student_id) {
         $avg =  collect(DB::select(DB::raw("SELECT $student_id as student_id, AVG(avgTypeScore) as avgStoryScore FROM (SELECT exercises.exetype_id as exetype_id,  story_id,AVG(COALESCE(score_teacher,0)) as avgTypeScore FROM (SELECT  exercises.id,exercises.story_id,exercises.exetype_id, scores.score_id,scores.score_teacher,scores.student_id,scores.exercise_id FROM exercises  LEFT JOIN ( SELECT scores.id as score_id,scores.score_teacher,scores.student_id,scores.exercise_id FROM exercises LEFT JOIN scores ON scores.exercise_id = exercises.id WHERE scores.student_id = $student_id) as scores ON scores.exercise_id = exercises.id WHERE  exercises.story_id = $story_id) as exercises GROUP BY exetype_id) as avgTypeScoreRes")))->first();
      $average = $average->push($avg);
   }



   return $average;
      //return collect(DB::select(DB::raw("SELECT AVG(avgTypeScore) as avgStoryScore FROM (SELECT exercise_types.id as exetype_id,  story_id,AVG(COALESCE(score_student,0)) as avgTypeScore FROM exercise_types LEFT JOIN (SELECT  exercises.id,exercises.story_id,exercises.exetype_id, scores.score_id,scores.score_student,scores.student_id,scores.exercise_id,scores.score_teacher FROM exercises  LEFT JOIN ( SELECT scores.id as score_id,scores.score_student,scores.student_id,scores.exercise_id,scores.score_teacher FROM exercises LEFT JOIN scores ON scores.exercise_id = exercises.id WHERE scores.student_id = $student_id) as scores ON scores.exercise_id = exercises.id WHERE  exercises.story_id = $story_id) as exercises ON exercises.exetype_id = exercise_types.id GROUP BY exercise_types.id) as avgTypeScoreRes")))->first();
   }
   public function getStudentAvgScoreByStudentIdAndStoryId($student_ids, $story_id)
   {
      
      $average = new Collection();
      foreach ($student_ids as $student_id) {
         $avg =  collect(DB::select(DB::raw("SELECT $student_id as student_id, AVG(avgTypeScore) as avgStoryScore FROM (SELECT exercises.exetype_id as exetype_id,  story_id,AVG(COALESCE(score_student,0)) as avgTypeScore FROM (SELECT  exercises.id,exercises.story_id,exercises.exetype_id, scores.score_id,scores.score_student,scores.student_id,scores.exercise_id,scores.score_teacher FROM exercises  LEFT JOIN ( SELECT scores.id as score_id,scores.score_student,scores.student_id,scores.exercise_id,scores.score_teacher FROM exercises LEFT JOIN scores ON scores.exercise_id = exercises.id WHERE scores.student_id = $student_id) as scores ON scores.exercise_id = exercises.id WHERE  exercises.story_id = $story_id) as exercises GROUP BY exetype_id) as avgTypeScoreRes")))->first();
      $average = $average->push($avg);
   }

   return $average;
      //return collect(DB::select(DB::raw("SELECT AVG(avgTypeScore) as avgStoryScore FROM (SELECT exercise_types.id as exetype_id,  story_id,AVG(COALESCE(score_student,0)) as avgTypeScore FROM exercise_types LEFT JOIN (SELECT  exercises.id,exercises.story_id,exercises.exetype_id, scores.score_id,scores.score_student,scores.student_id,scores.exercise_id,scores.score_teacher FROM exercises  LEFT JOIN ( SELECT scores.id as score_id,scores.score_student,scores.student_id,scores.exercise_id,scores.score_teacher FROM exercises LEFT JOIN scores ON scores.exercise_id = exercises.id WHERE scores.student_id = $student_id) as scores ON scores.exercise_id = exercises.id WHERE  exercises.story_id = $story_id) as exercises ON exercises.exetype_id = exercise_types.id GROUP BY exercise_types.id) as avgTypeScoreRes")))->first();
   }

   public function getAvgScoreByClassIdsAndByExerciseTypeGroupByStudentId($exercise_type_id,$class_ids){
      
   $class_ids = collect($class_ids)->implode(',');
   if(!empty($class_ids)){
   return   collect(DB::select(DB::raw("SELECT student_id ,AVG(score_teacher) as avgScore From scores WHERE scores.student_id IN (SELECT id FROM students WHERE students.classe_id IN ($class_ids)) AND scores.exercise_id IN (SELECT id FROM exercises WHERE exercises.exetype_id = $exercise_type_id ) GROUP BY scores.student_id")));
   }else{
      return collect();
   }
       }
   public function getAvgScoreByClassIdsAndByExerciseTypeGroupByStudentIdAndClassIds($exercise_type_id,$class_ids){
      
      
      $average = new Collection();
      foreach ($class_ids as $class_id) {
         $avg =  collect(DB::select(DB::raw("SELECT $class_id as class_id, AVG(avgScore) as avgScoreByClass FROM (SELECT student_id ,AVG(score_teacher) as avgScore From scores WHERE scores.student_id IN (SELECT id FROM students WHERE students.classe_id  = $class_id) AND scores.exercise_id IN (SELECT id FROM exercises WHERE exercises.exetype_id = $exercise_type_id ) GROUP BY scores.student_id) as avgScoreByStudent")))->first();
      $average = $average->push($avg);
   }

   return $average;
   
       }

       public function getAvgScoreByAcademicLevelIdsAndByExerciseTypeAndSchoolIdGroupByStudentIdAndAcademicLevelIds($exercise_type_id,$school_id,$academic_level_ids){
      
      
         $average = new Collection();
         foreach ($academic_level_ids as $academic_level_id) {
            $avg =  collect(DB::select(DB::raw("SELECT $academic_level_id as academic_level_id, AVG(avgScore) as avgScoreByAcademicLevel FROM (SELECT student_id ,AVG(score_teacher) as avgScore From scores WHERE scores.student_id IN (SELECT id FROM students WHERE students.classe_id  IN (SELECT id FROM classes where academic_level_id =  $academic_level_id AND school_id = $school_id)) AND scores.exercise_id IN (SELECT id FROM exercises WHERE exercises.exetype_id = $exercise_type_id ) GROUP BY scores.student_id) as avgScoreByStudent")))->first();
         $average = $average->push($avg);
      }
   
      return $average;
      
          }
}
