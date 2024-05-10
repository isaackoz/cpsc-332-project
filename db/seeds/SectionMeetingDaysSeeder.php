<?php


use Phinx\Seed\AbstractSeed;

class SectionMeetingDaysSeeder extends AbstractSeed
{
    public function getDependencies(): array
    {
        return [
            'SectionSeeder'
        ];
    }

    public function run(): void
    {
        $data = [
            [
                'section_num_id'    => 1,
                'day'               => 'Monday'
            ],
            [
                'section_num_id'    => 1,
                'day'               => 'Wednesday'
            ],
            [
                'section_num_id'    => 2,
                'day'               => 'Tuesday'
            ],
            [
                'section_num_id'    => 2,
                'day'               => 'Thursday'
            ],
            [
                'section_num_id'    => 3,
                'day'               => 'Monday'
            ],
            [
                'section_num_id'    => 3,
                'day'               => 'Friday'
            ],
            [
                'section_num_id'    => 4,
                'day'               => 'Monday'
            ],
            [
                'section_num_id'    => 4,
                'day'               => 'Wednesday'
            ],
            [
                'section_num_id'    => 5,
                'day'               => 'Monday'
            ],
            [
                'section_num_id'    => 5,
                'day'               => 'Saturday'
            ],
            [
                'section_num_id'    => 6,
                'day'               => 'Monday'
            ],
            [
                'section_num_id'    => 6,
                'day'               => 'Tuesday'
            ],
        ];

        $meeting = $this->table('section_meeting_days');
        $meeting->insert($data)->saveData();
    }
}
