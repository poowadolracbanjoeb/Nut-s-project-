<?php
  
namespace App\Imports;
  
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
  
class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'id'     => $row['id'],
            'name'     => $row['name'],
            'email'    => $row['email'], 
            'password' => \Hash::make($row['password']),
            'tel'     => $row['tel'],
            'student_degree'     => $row['student_degree'],
            'student_faculty'     => $row['student_faculty'],
            'student_score'     => $row['student_score'],
            'id_role'     => $row['id_role'],
            'id_room'     => $row['id_room'],
        ]);
    }
}