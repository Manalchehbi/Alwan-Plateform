<?php 

namespace App\Repositories;


interface ScoreRepositoryInterface {

   
    public function save($score);
    public function update($score,$id);
    public function findOrFail($id);
    public function findByExerciseIdAndStudentId($exercise_id,$student_id);
    public function findByStudentId($student_id);
    public function getAvgScoreByStudentIdGroupByStoryId($student_ids);
    public function getAvgScoreByStudentIdGroupByExerciseType($student_ids);
    public function getAvgScoreGroupByExerciseType();
    public function getAvgScoreByStudentIdAndStoryId($student_id,$story_id);
    public function getStudentAvgScoreByStudentIdAndStoryId($student_id,$story_id);
    public function getAvgScoreByStudentIdAndStoryIdGroupByExerciseType($student_id,$story_id);
    public function getAvgScoreByClassIdsAndByExerciseTypeGroupByStudentId($exercise_type_id,$class_ids);
    public function getAvgScoreByClassIdsAndByExerciseTypeGroupByStudentIdAndClassIds($exercise_type_id,$class_ids);
    public function getAvgScoreByAcademicLevelIdsAndByExerciseTypeAndSchoolIdGroupByStudentIdAndAcademicLevelIds($exercise_type_id,$school_id,$academic_level_ids);


}


