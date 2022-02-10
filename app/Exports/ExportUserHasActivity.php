<?php
  
namespace App\Exports;
  
use App\Models\CheckName;
use Maatwebsite\Excel\Concerns\FromCollection;
  
class ExportUserHasActivity implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CheckName::all();
    }
}