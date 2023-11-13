<?php


namespace App\Repositories;

use App\Models\Exercise;

class ExerciseRepository implements ExerciseRepositoryInterface {


   public function save($data){

        $exercise = new Exercise;
        $exercise->name = $data['name'];
        $exercise->path = $data['path'];
        $exercise->picture = $data['picture'];
        $exercise->exetype_id = $data['type_id'];
        $exercise->story_id = $data['story_id'];
        $exercise->save();
        
        return true;
        
   }
 
   public function findOrFail($id)
   {
      return Exercise::findOrFail($id);
   }


}