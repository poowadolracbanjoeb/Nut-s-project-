<?php
  
namespace App\Exports;
  
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
  
class UsersExport implements FromCollection
{

    protected $id_users;

    function __construct($id_users) {
           $this->id_users = $id_users;
    }
       /**
       * @return \Illuminate\Support\Collection
       */
       public function collection()
       {
           return User::where('activityName',$this->id_users)->get();
       }
}