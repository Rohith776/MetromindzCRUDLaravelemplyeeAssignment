<?php

use App\Http\Controllers\EmployeeController;
use App\Models\employee;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   // $users = employee::all();
   $users = DB::table('employee')->orderBy('username','asc')->paginate(10);
    return view('welcome', compact('users'));
});

          // Route::get('/employee/create', [EmployeeController::class, 'create']);
//Route::get('employee/all',[EmployeeController::class,'employee'])->name('all.employee');

  Route::post('employee/add',[EmployeeController::class,'employeeAdd'])->name('store.employee');


  Route::get('/employee/edit/{id}',[EmployeeController::class,'Edit']);

Route::post('/employee/update/{id}',[EmployeeController::class,'update']);


Route::get('/employee/delete/{id}',[EmployeeController::class, 'delete']);
