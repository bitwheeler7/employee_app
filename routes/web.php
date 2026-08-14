<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::redirect('/','/employees');
Route::resource('employees', EmployeeController::class);
Route::get('/get-cities/{state_id}', [EmployeeController::class, 'getCities']);