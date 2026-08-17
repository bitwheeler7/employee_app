<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            'PHP',
            'Laravel',
            'JavaScript',
            'React',
            'HTML',
            'CSS',
            'MySQL',
            'Python',
            'Java',
            'C++',
        ];

        foreach ($skills as $skill) {

            Skill::create([
                'name' => $skill,
                'status' => true
            ]);

        }
    }
}