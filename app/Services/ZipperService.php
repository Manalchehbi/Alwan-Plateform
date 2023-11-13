<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use ZipArchive;

class ZipperService implements ZipperServiceInterface{

      public function unzip($file, $destination)
      {
        
        $zip = new ZipArchive();
        $status = $zip->open($file);
        if ($status !== true) {
         throw new \Exception($status);
        }
        else{
            $destination= storage_path($destination);
           
            if (!Storage::exists($destination)) {
                Storage::makeDirectory($destination, 0755, true);
                
            }
            $zip->extractTo($destination);
            $zip->close();
            return true;
        }
    }

}
