<?php

namespace App\Imports;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TeachersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {   $user = new  User([
        "role_id" => 3,
        "name" => $row['first_name'].' '.$row['last_name'],
        "email" => $row['email'],
        "password" => Hash::make('password'),
    ]);
    $user->save();
        return new Teacher([
            "user_id" => $user->id,
            "first_name" => $row['first_name'],
            "last_name" => $row['last_name'],
            "adresse"=>$row['adresse'],
            "email"=>$row['email'],
            "picture" => 'avatar.jpg',
            "phone" => $row['mobile_number'],
            "gender" =>$row['gender'],
            "speciality_id"=>$row['speciality_id'],
            "classe_id"=>$row['classe_id'],
            "school_id"=>$row['school_id'],
            
        ]);
    }
}