<?php


use Phinx\Seed\AbstractSeed;

class DepartmentSeeder extends AbstractSeed
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
                'name'              => 'Computer Science',
                'telephone_area'    => '949',
                'telephone_num'     => '123-4567',
                'office_location'   => 'Room 111b',
                'chairperson_ssn'   => '000-000-0001'
            ],
            [
                'name'              => 'Aerospace Engineering',
                'telephone_area'    => '949',
                'telephone_num'     => '123-5555',
                'office_location'   => 'Room 232a',
                'chairperson_ssn'   => '000-000-0002'
            ],
        ];

        $dept = $this->table('department');
        $dept->insert($data)->saveData();
    }
}
