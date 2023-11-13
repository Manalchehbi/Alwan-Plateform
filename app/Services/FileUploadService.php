<?php 


    namespace App\Services;

use Illuminate\Support\Facades\Storage;

    class FileUploadService implements FileUploadServiceInterface{
    
      

    public function upload($file,$path){ 
       
        if (!is_null($file)) {
            
            return  Storage::putFile($path, $file);
           
        }
        return false;

      }

    public function remove($path){ 
       
        if (!is_null($path) ) {
            
            return  Storage::delete($path);
           
        }
        return false;

      }
    }