<?php 

namespace App\Services;

interface StoryServiceInterface {
    
    public function saveStory($story);
    public function readStory($id);
    public function saveStoryRead($story_id);

}