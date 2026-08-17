<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\Skill;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with([
            'country',
            'state',
            'city',
            'skill',
            'department'
        ])->get();

        return view('employees.index', compact('employees'));
    }


    public function create()
    {
        $countries = Country::all();
        $skills = Skill::all();
        $departments = Department::all();

        return view(
            'employees.create',
            compact('countries', 'skills', 'departments')
        );
    }


    public function getStates($country_id)
    {
        $states = State::where(
            'country_id',
            $country_id
        )->get();

        return response()->json($states);
    }


    public function getCities($state_id)
    {
        $cities = City::where(
            'state_id',
            $state_id
        )->get();

        return response()->json($cities);
    }


    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required',

            'email' => 'required|email|unique:employees,email',

            'phone' => 'required',

            'salary' => 'required|numeric',

            'country_id' => 'required',

            'state_id' => 'required',

            'city_id' => 'required',

            'skill_id' => 'required',

            'department_id' => 'required',

            'joining_date' => 'required|date',

            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

        ]);


        $data = $request->all();


        if ($request->hasFile('photo')) {

            $data['photo'] =
                $request->file('photo')->store(
                    'employees',
                    'public'
                );
        }


        Employee::create($data);


        return redirect()
            ->route('employees.index')
            ->with('success', 'Employee Added Successfully');
    }


    public function edit($id)
    {
        $employee = Employee::findOrFail($id);

        $countries = Country::all();
        $skills = Skill::all();
        $departments = Department::all();

        return view(
            'employees.edit',
            compact(
                'employee',
                'countries',
                'skills',
                'departments'
            )
        );
    }


    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);


        $request->validate([

            'name' => 'required',

            'email' =>
                'required|email|unique:employees,email,' .
                $employee->id,

            'phone' => 'required',

            'salary' => 'required|numeric',

            'country_id' => 'required',

            'state_id' => 'required',

            'city_id' => 'required',

            'skill_id' => 'required',

            'department_id' => 'required',

            'joining_date' => 'required|date',

            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

        ]);


        $data = $request->all();


        if ($request->hasFile('photo')) {

            $data['photo'] =
                $request->file('photo')->store(
                    'employees',
                    'public'
                );
        }


        $employee->update($data);


        return redirect()
            ->route('employees.index')
            ->with('success', 'Employee Updated Successfully');
    }


    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);

        $employee->delete();

        return redirect()
            ->route('employees.index')
            ->with('success', 'Employee Deleted Successfully');
    }
}