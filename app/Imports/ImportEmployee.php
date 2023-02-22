<?php

namespace App\Imports;
use App\Models\User;
use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithUpserts;

class ImportEmployee implements ToModel, WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employee([
            'name' => $row[0],
            'email' => $row[1],
            'mobile' => $row[2],
        ]);
     }
     public function uniqueBy()
     {
         return 'email';
     }
}
