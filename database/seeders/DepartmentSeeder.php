<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            'HR',
            'IT',
            'Finance',
            'Marketing',
            'Sales',
            'Development',
            'Testing',
            'Administration',
        ];

        foreach ($departments as $department) {

            Department::create([
                'name' => $department,
                'status' => true
            ]);

        }
    }
}