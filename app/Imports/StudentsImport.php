<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user = new  User([
            "role_id" => 1,
            "name" => $row['first_name'].' '.$row['last_name'],
            "email" => $row['email'],
            "is_freetrial"=>0,
            "password" => Hash::make('password'),
        ]);
        $user->save();
        return new Student([
            "user_id" => $user->id,
            "first_name" => $row['first_name'],
            "last_name" => $row['last_name'],
            "date_naissance"=>$row['date_naissance'],
            "phone" => $row['mobile_number'],
            "email" => $row['email'],
            "avatar" => 'avatar.jpg',
            "parentsName" =>$row['parents_name'],
            "parentsMobileNumber" =>$row['parents_phone'],
            "gender" => $row['gender'],
            "classe_id"=>$row['classe_id'],
            "school_id"=>$row['school_id'],

        ]);
    }
}