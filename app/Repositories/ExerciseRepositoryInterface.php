<?php 

namespace App\Repositories;


interface ExerciseRepositoryInterface {

   
    public function save($exercise);
    public function findOrFail($id);


}


