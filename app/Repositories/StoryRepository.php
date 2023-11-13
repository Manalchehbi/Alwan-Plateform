<?php


namespace App\Repositories;

use App\Models\Stories;

class StoryRepository implements StoryRepositoryInterface {


   public function save($data){

        $story = new Stories;
        $story->name = $data['name'];
        $story->description = $data['description'];
        $story->path = $data['path']; 
        $story->picture = $data['picture'];
        $story->difficulty_level_id = $data['difficulty_level_id'];
        $story->save();
        
        $story->types()->attach($data['type_id']);
        $story->academic_levels()->attach($data['academic_level_id']);
        return true;
        
   }
  public function findOrFail($id)
  {
   return Stories::findOrFail($id);
  }


}