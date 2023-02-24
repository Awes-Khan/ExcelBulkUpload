<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/file-import',function (Request $request){
    return view('file-import');
})->name('file.import');
Route::post('import',[EmployeeController::class,'import'])->name('import');
Route::get('/export-users',[EmployeeController::class,'exportEmployees'])->name('export');
Route::get('/export-excel',[EmployeeController::class,'exportExcel'])->name('export.excel');
Route::get('/export-csv',[EmployeeController::class,'exportCSV'])->name('export.csv');
Route::get('/export',[EmployeeController::class,'exportView'])->name('export.index');
Route::get('/export-blank',[EmployeeController::class,'exportBlank'])->name('export.blank');
Route::get('/table',[EmployeeController::class,'index'])->name('index');
Route::get('/test',[EmployeeController::class,'getEmployees'])->name('employees.list');

Route::delete('/employee/{id}',[EmployeeController::class,'destroy'])->name('employees.destroy');


require __DIR__.'/auth.php';
