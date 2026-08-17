<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::redirect('/','/employees');

Route::get('/employees', [EmployeeController::class, 'index'])
    ->name('employees.index');

Route::get('/employees/create', [EmployeeController::class, 'create'])
    ->name('employees.create');

Route::post('/employees', [EmployeeController::class, 'store'])
    ->name('employees.store');

Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])
    ->name('employees.edit');

Route::put('/employees/{id}', [EmployeeController::class, 'update'])
    ->name('employees.update');

Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])
    ->name('employees.destroy');

Route::get('/employees/states/{country_id}', [EmployeeController::class, 'getStates'])
    ->name('employees.states');

Route::get('/employees/cities/{state_id}', [EmployeeController::class, 'getCities'])
    ->name('employees.cities');