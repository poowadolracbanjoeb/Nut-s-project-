<?php
  
namespace App\Exports;
  
use App\Models\users_has_activities;
use Maatwebsite\Excel\Concerns\FromCollection;
  
class ExportUserHasActivity implements FromCollection
{
    protected $activityName;

 function __construct($activityName) {
        $this->activityName = $activityName;
 }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return users_has_activities::where('activityName',$this->activityName)->get();
    }
}

