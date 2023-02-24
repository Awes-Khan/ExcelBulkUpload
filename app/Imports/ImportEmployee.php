<?php

namespace App\Imports;
use App\Models\User;
use App\Models\Employee;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithValidation;

class ImportEmployee implements ToModel,WithValidation,WithHeadingRow,SkipsEmptyRows
{
    use Importable, SkipsErrors,SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // foreach($rows as $row)
        // {
        //     $employee = [
        //         'name' => $row['name'],
        //         'email' => $row['email'],
        //         'mobile'=>$row['mobile_number'],
        //     ];
        //     Employee::create($employee);
        // }
        return new Employee([
                'name' => $row['name'],
                'email' => $row['email'],
                'mobile'=>$row['mobile_number'],
    ]);
     }
    //  public function uniqueBy()
    //  {
    //      return 'email';
    //  }
     public function rules() :array {
        return [
            '*.email' => ['email','unique:employees,email'],
            'name'=>'required',
            'email'=>'required|unique:employees,email',
            'mobile_number'=>'required',
        ];
     }
    //  public function onError(\Throwable $e)
    //  {
    //      // Handle the exception how you'd like.
    //  }
}
