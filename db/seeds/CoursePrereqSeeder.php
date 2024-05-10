<?php


use Phinx\Seed\AbstractSeed;

class CoursePrereqSeeder extends AbstractSeed
{
    public function getDependencies(): array
    {
        return [
            'CourseSeeder',
        ];
    }

    public function run(): void
    {
        $data = [
            [
                'course_id'         => 2,
                'course_prereq_id'  => 1,
            ],
            [
                'course_id'         => 4,
                'course_prereq_id'  => 3,
            ]
        ];

        $cpre = $this->table('course_prereq');
        $cpre->insert($data)->saveData();
    }
}
