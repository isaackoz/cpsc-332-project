<?php


use Phinx\Seed\AbstractSeed;

class StudentMinors extends AbstractSeed
{
    public function getDependencies(): array
    {
        return [
            'StudentSeeder'
        ];
    }
    public function run(): void
    {
        $data = [
            [
                'student_id'    => '00001',
                'dept_num'      => 2,
            ],
            [
                'student_id'    => '00003',
                'dept_num'      => 2,
            ],
            [
                'student_id'    => '00008',
                'dept_num'      => 1,
            ],
        ];

        $stdmin = $this->table('student_minor');
        $stdmin->insert($data)->saveData();
    }
}
