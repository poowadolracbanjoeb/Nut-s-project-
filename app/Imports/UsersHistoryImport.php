<?php

namespace App\Imports;

use App\Models\dormitory_user_history;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersHistoryImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new dormitory_user_history([
            'semester'     => $row['semester'],
            'room'     => $row['room'],
            'dormName'     => ($row['dorm']),
            'id_users'     => $row['id_users'],
        ]);
    }
}
