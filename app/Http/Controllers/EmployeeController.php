<?php

namespace App\Http\Controllers;

use App\Exports\ExportEmployee;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportUser;
use App\Exports\ExportUser;
use App\Imports\ImportEmployee;
use App\Models\User;
class EmployeeController extends Controller
{
    public function importView(Request $request){
        return view('importFile');
    }

    public function import(Request $request){
        Excel::import(new ImportEmployee,
                      $request->file('file')->store('files'));
        return redirect()->back()->with('status', 'All Data Imported Uploaded Successfully!');
    }

    public function exportUsers(Request $request){
        return Excel::download(new ExportEmployee, 'users.xlsx');
    }
}
