<?php 

namespace App\Services;

interface ExerciseServiceInterface {
    
    public function saveExercise($exercise);
    public function takeExercise($id);
    public function saveExerciseTake($data);
    public function findOrFail($id);

}