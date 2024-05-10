<?php


use Phinx\Seed\AbstractSeed;

class SectionSeeder extends AbstractSeed
{
    public function getDependencies(): array
    {
        return [
            'ProfessorSeeder',
            'CourseSeeder'
        ];
    }
    public function run(): void
    {
        $data = [
            [
                'section_num'       => 1,
                'course_num'        => 1,
                'professor_ssn'     => '000-000-0000',
                'classroom'         => 'Room 540a',
                'num_seats'         => 32,
                'begin_time'        => '10:00am',
                'end_time'          => '11:15am'
            ],
            [
                'section_num'       => 2,
                'course_num'        => 1,
                'professor_ssn'     => '000-000-0000',
                'classroom'         => 'Room 540a',
                'num_seats'         => 28,
                'begin_time'        => '11:30am',
                'end_time'          => '12:45pm'
            ],
            [
                'section_num'       => 1,
                'course_num'        => 2,
                'professor_ssn'     => '000-000-0001',
                'classroom'         => 'Room 333',
                'num_seats'         => 32,
                'begin_time'        => '10:00am',
                'end_time'          => '11:15am'
            ],
            [
                'section_num'       => 2,
                'course_num'        => 2,
                'professor_ssn'     => '000-000-0001',
                'classroom'         => 'Room 444',
                'num_seats'         => 32,
                'begin_time'        => '8:30am',
                'end_time'          => '9:45am'
            ],
            [
                'section_num'       => 1,
                'course_num'        => 3,
                'professor_ssn'     => '000-000-0002',
                'classroom'         => 'Room 34b',
                'num_seats'         => 15,
                'begin_time'        => '10:00am',
                'end_time'          => '11:15am'
            ],
            [
                'section_num'       => 1,
                'course_num'        => 4,
                'professor_ssn'     => '000-000-0002',
                'classroom'         => 'Room 99a',
                'num_seats'         => 64,
                'begin_time'        => '10:00am',
                'end_time'          => '1:00pm'
            ],
        ];

        $sect = $this->table('section');
        $sect->insert($data)->saveData();
    }
}
