<?php


use Phinx\Seed\AbstractSeed;

class CollegeDegrees extends AbstractSeed
{
    
    public function getDependencies(): array
    {
        return [
            'ProfessorSeeder',
        ];
    }

    public function run(): void
    {
        $data = [
            [
                'degree_title'      => 'B.S. Computer Science',
                'school'            => 'Harvard',
                'professor_id'      => '000-000-0000'
            ],
            [
                'degree_title'      => 'B.S. Computer Science',
                'school'            => 'Harvard',
                'professor_id'      => '000-000-0001'
            ],
            [
                'degree_title'      => 'Minor in Math',
                'school'            => 'CSUF',
                'professor_id'      => '000-000-0000'
            ],
            [
                'degree_title'      => 'B.S. Medicine',
                'school'            => 'Cornell',
                'professor_id'      => '000-000-0001'
            ],
            [
                'degree_title'      => 'B.S. Aerospace Engineering',
                'school'            => 'Harvard',
                'professor_id'      => '000-000-0002'
            ],
        ];

        $degrees = $this->table('college_degrees');
        $degrees->insert($data)->saveData();
    }
}
