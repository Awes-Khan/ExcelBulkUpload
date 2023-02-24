<?php

namespace App\Http\Controllers;

use App\Exports\EmployeeTemplateExport;
use App\Exports\ExportEmployee;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportUser;
use App\Exports\ExportUser;
use App\Imports\ImportEmployee;
use App\Models\User;
use App\Models\Employee;
use Yajra\DataTables\Facades\DataTables;
class EmployeeController extends Controller
{
    public function importView(Request $request){
        return view('importFile');
    }

    public function import(Request $request){
        $file=$request->file('file')->store('files');
        $import = new ImportEmployee();
        // dd($import);
        $import->import($file);
        // dd($import->errors());

        // $uploded= Excel::import(new ImportEmployee,$request->file('file')->store('files'));
        // dd($uploded);


        return redirect()->back();
    }

    public function exportEmployees(Request $request){
        return Excel::download(new ExportEmployee, 'employees.xlsx');
    }
    public function exportExcel(Request $request){
        return Excel::download(new ExportEmployee, 'employees.xlsx',\Maatwebsite\Excel\Excel::XLSX);
    }
    public function exportCSV(Request $request){
        return Excel::download(new ExportEmployee, 'employees.csv',\Maatwebsite\Excel\Excel::CSV);
    }
    public function exportBlank(Request $request){
        return Excel::download(new EmployeeTemplateExport, 'template.xlsx');
    }

    public function exportView(Request $request){
        return view('importFile');
    }
    public function destroy($id){

        $status = Employee::find($id)->delete();
        response()->json(array('status' => $status));
    }
    public function index(){

        return view('emp',['employees'=>array('key'=>'value')]);
    }
    public function getEmployees(Request $request)
    {
        if ($request->ajax()) {
            $data = Employee::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a onclick="editEmployee('.$row['id'].');" class="edit btn btn-success btn-sm">Edit</a> <a onclick="deleteEmployee('.$row['id'].');" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
