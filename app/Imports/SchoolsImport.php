<?php

namespace App\Imports;

use App\Models\School;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\IOFactory;

class SchoolsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
        {  
            $user = new  User([
                "role_id" => 4,
                "name" => $row['name'],
                "email" => $row['email'],
                "password" => Hash::make('password'),
            ]);
         $user->save();
     
        return new School([
                "user_id" => $user->id,
                "name" => $row['name'],
                "logo" => 'images/schools/1665094554.jpg',
                "adresse" => $row['adresse'],
                "phone" => $row['mobile_number'],
                "email" => $row['email'],
            ]);
        


    
    }
}
