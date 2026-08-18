<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::redirect('/','/employees');

Route::resource('/employees', EmployeeController::class);


Route::get('/employees/states/{country_id}', [EmployeeController::class, 'getStates'])
    ->name('employees.states');

Route::get('/employees/cities/{state_id}', [EmployeeController::class, 'getCities'])
    ->name('employees.cities');