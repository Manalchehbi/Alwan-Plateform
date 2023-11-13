<?php 

namespace App\Repositories;


interface StoryReadRepositoryInterface {

   
    public function save($score);
    public function update($score,$id);
    public function findOrFail($id);
    public function findByStoryIdAndStudentId($story_id,$student_id);
    public function getNumberOfReadStoriesGroupByStudentId($class_ids);
    public function getAvgReadStoriesByClassIds($class_ids);

}


