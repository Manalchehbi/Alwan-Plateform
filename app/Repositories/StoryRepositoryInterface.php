<?php 

namespace App\Repositories;


interface StoryRepositoryInterface {

   
    public function save($story);
    public function findOrFail($id);


}


