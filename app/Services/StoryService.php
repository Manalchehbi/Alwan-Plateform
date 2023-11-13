<?php 


    namespace App\Services;

use App\Repositories\StoryReadRepositoryInterface;
use App\Repositories\StoryRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

    class StoryService implements StoryServiceInterface{
    
        private $storyRepo;
        private $storyReadRepo;
        public function __construct(StoryRepositoryInterface $storyRepository,StoryReadRepositoryInterface $storyReadRepository)
        {
            $this->storyRepo = $storyRepository;
            $this->storyReadRepo = $storyReadRepository;
        }
      
    public function saveStory($request){ 
        $data = $request->only([
            'name',
            'description',
            'type_id',
            'academic_level_id',
            'difficulty_level_id',
          ]);
          $data['picture'] = '';
          $data['path'] = '';
        if($request->hasfile('picture')){

            $file=$request->file('picture');
            $path = 'images/stories';
            $data['picture'] = (new FileUploadService)->upload($file,$path);
        }  
        if($request->hasfile('path')){

            $file=$request->file("path")->getRealPath();
            $path = 'stories/'.uniqid();
            (new ZipperService)->unzip($file,'app/'.$path);
            $data['path'] = $path.'/index.html';
        }    
        
        $this->storyRepo->save($data);


        return true;
      }
     
      public function readStory($id)
      { 
        
        $story = $this->storyRepo->findOrFail($id);


        return response()->redirectTo(LaravelLocalization::setLocale()."file_storage/" . $story->path . "?story_id=" . $id . "&token=" . csrf_token());
     
      }
      
      public function saveStoryRead($data)
      {
        (isset($data['story_id'])) ?  $story_id = $data['story_id'] : $story_id = "";
       
     
    
         if(Auth::user()->student!=null){
    
        $read = $this->storyReadRepo->findByStoryIdAndStudentId($story_id,Auth::user()->student->id);
       
        if ($read->isEmpty()) {
         
          $_data['story_id']=  $story_id;
          
        $this->storyReadRepo->save($_data);
        }else{
          
        
            
            $repitition = $read->first()->nbre +1;
            $_data['repitition']=  $repitition;
        
          
          $this->storyReadRepo->update($_data,$read->first()->id);
        
        }
        
        
      }
      return response($data);
      }

    }