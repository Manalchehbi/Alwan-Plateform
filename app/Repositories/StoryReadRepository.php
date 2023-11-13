<?php


namespace App\Repositories;

use App\Models\StoryRead;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StoryReadRepository implements StoryReadRepositoryInterface {


   public function save($data){

        $score = new StoryRead;
        $score->story_id = $data['story_id'];
        $score->student_id = Auth::user()->student->id;
        $score->nbre = 0;
        $score->save();
        
        return true;
        
   }
   public function update($data,$id){
     
      $score = StoryRead::findOrFail($id);
      $score->nbre = $data['repitition'];
      $score->save();  
        
        return true;
        
   }
 
   public function findOrFail($id)
   {
      return StoryRead::findOrFail($id);
   }

   public function findByStoryIdAndStudentId($story_id, $student_id)
   {
      return StoryRead::where("story_id",$story_id)->where("student_id",$student_id)->get();
   }

   
   public function getNumberOfReadStoriesGroupByStudentId($class_ids){

      $class_ids = collect($class_ids)->implode(',');
      if(!empty($class_ids)){
      return   collect(DB::select(DB::raw("SELECT student_id ,count(student_id) as nbReadStories From story_reads WHERE story_reads.student_id IN (SELECT id FROM students WHERE students.classe_id IN ($class_ids)) GROUP BY story_reads.student_id")));
   }else{
      return collect();
   }
     
   }

   public function getAvgReadStoriesByClassIds($class_ids){
      
      $average = new Collection();
      foreach ($class_ids as $class_id) {
         $avg =  collect(DB::select(DB::raw("SELECT $class_id as class_id, AVG(nbReadStories) as avgNbReadStories FROM  (SELECT student_id ,count(student_id) as nbReadStories From story_reads WHERE story_reads.student_id IN (SELECT id FROM students WHERE students.classe_id = $class_id) GROUP BY story_reads.student_id) as nbReadStoriesByStudent")))->first();
      $average = $average->push($avg);
   }

   return $average;
   }
}