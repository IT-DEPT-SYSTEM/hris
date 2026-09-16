<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            'IT',
            'Human Resources',
            'Finance',
            'Operations',
            'Sales',
            'Marketing',
            'Customer Service',
        ];

        foreach ($departments as $department) {
            Department::firstOrCreate([
                'name' => $department,
            ]);
        }
    }
}