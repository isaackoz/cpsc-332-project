<?php


use Phinx\Seed\AbstractSeed;

class EnrollementSeeder extends AbstractSeed
{
    public function getDependencies(): array
    {
        return [
            'StudentSeeder',
            'SectionSeeder'
        ];
    }
    public function run(): void
    {
        $data = [
            [
                'student_id'    => '00001', // 00001 - 00008
                'section_num'   => 1, // 1-6
                'grade'         => 'B'
            ],
            [
                'student_id'    => '00002', // 00001 - 00008
                'section_num'   => 1, // 1-6
                'grade'         => 'A'
            ],
            [
                'student_id'    => '00003', // 00001 - 00008
                'section_num'   => 1, // 1-6
                'grade'         => 'C'
            ],
            [
                'student_id'    => '00004', // 00001 - 00008
                'section_num'   => 1, // 1-6
                'grade'         => 'A'
            ],
            [
                'student_id'    => '00005', // 00001 - 00008
                'section_num'   => 1, // 1-6
                'grade'         => 'B'
            ],
            [
                'student_id'    => '00006', // 00001 - 00008
                'section_num'   => 1, // 1-6
                'grade'         => 'C'
            ],
            [
                'student_id'    => '00001', // 00001 - 00008
                'section_num'   => 2, // 1-6
                'grade'         => 'C+'
            ],
            [
                'student_id'    => '00002', // 00001 - 00008
                'section_num'   => 2, // 1-6
                'grade'         => 'D'
            ],
            [
                'student_id'    => '00003', // 00001 - 00008
                'section_num'   => 2, // 1-6
                'grade'         => 'A-'
            ],
            [
                'student_id'    => '00004', // 00001 - 00008
                'section_num'   => 2, // 1-6
                'grade'         => 'A'
            ],
            [
                'student_id'    => '00005', // 00001 - 00008
                'section_num'   => 3, // 1-6
                'grade'         => 'A'
            ],
            [
                'student_id'    => '00006', // 00001 - 00008
                'section_num'   => 3, // 1-6
                'grade'         => 'B'
            ],
            [
                'student_id'    => '00001', // 00001 - 00008
                'section_num'   => 3, // 1-6
                'grade'         => 'C'
            ],
            [
                'student_id'    => '00002', // 00001 - 00008
                'section_num'   => 4, // 1-6
                'grade'         => 'D'
            ],
            [
                'student_id'    => '00003', // 00001 - 00008
                'section_num'   => 4, // 1-6
                'grade'         => 'F'
            ],
            [
                'student_id'    => '00004', // 00001 - 00008
                'section_num'   => 4, // 1-6
                'grade'         => 'A'
            ],
            [
                'student_id'    => '00005', // 00001 - 00008
                'section_num'   => 4, // 1-6
                'grade'         => 'B'
            ],
            [
                'student_id'    => '00006', // 00001 - 00008
                'section_num'   => 5, // 1-6
                'grade'         => 'C'
            ],
            [
                'student_id'    => '00007', // 00001 - 00008
                'section_num'   => 5, // 1-6
                'grade'         => 'C'
            ],
            [
                'student_id'    => '00008', // 00001 - 00008
                'section_num'   => 6, // 1-6
                'grade'         => 'F'
            ],
        ];

        $enroll = $this->table('enrollement');
        $enroll->insert($data)->saveData();
    }
}
