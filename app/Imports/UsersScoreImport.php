<?php

namespace App\Imports;

use App\Models\user_score;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersScoreImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new user_score([
            'id_users'     => $row['id_users'],
            'semester'     => $row['semester'],
            'count_of_activities'     => ($row['count_of_activities']),
            'sum_score'     => $row['sum_score'],
        ]);
    }
}
