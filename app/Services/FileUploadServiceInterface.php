<?php 

namespace App\Services;

interface FileUploadServiceInterface {
    
    public function upload($file,$path);
    public function remove($path);

}