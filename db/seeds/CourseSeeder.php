<?php


use Phinx\Seed\AbstractSeed;

class CourseSeeder extends AbstractSeed
{
    public function getDependencies(): array
    {
        return [
            'DepartmentSeeder',
        ];
    }

    public function run(): void
    {
        $data = [
            [
                'title'     => 'Intro to Computers',
                'textbook'  => 'Computers and You Edition 2',
                'units'     => 4,
                'dept_id'   => 1,
            ],
            [
                'title'     => 'Compilers',
                'textbook'  => 'Compilers Edition 9',
                'units'     => 4,
                'dept_id'   => 1,
            ],
            [
                'title'     => 'Intro to Planes',
                'textbook'  => 'Planes, trains, and automobiles',
                'units'     => 2,
                'dept_id'   => 2,
            ],
            [
                'title'     => 'Intro to Space',
                'textbook'  => 'The vast space, edition 4',
                'units'     => 4,
                'dept_id'   => 2,
            ],
        ];

        $course = $this->table('course');
        $course->insert($data)->saveData();
    }
}
