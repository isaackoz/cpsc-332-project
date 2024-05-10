<?php


use Phinx\Seed\AbstractSeed;

class StudentSeeder extends AbstractSeed
{
    public function getDependencies(): array
    {
        return [
            'AddressSeeder',
            'DepartmentSeeder'
        ];
    }

    public function run(): void
    {
        $data = [
            [
                'campus_id'     =>  '00001',
                'first_name'    =>  'John',
                'last_name'     =>  'Wayne',
                'telephone_area'=>  '949',
                'telephone_num' =>  '444-5555',
                'address_id'    =>  4,
                'major_dept_num'=>  1,
            ],
            [
                'campus_id'     =>  '00002',
                'first_name'    =>  'Dave',
                'last_name'     =>  'Dadert',
                'telephone_area'=>  '949',
                'telephone_num' =>  '444-2320',
                'address_id'    =>  5,
                'major_dept_num'=>  1,
            ],
            [
                'campus_id'     =>  '00003',
                'first_name'    =>  'Long',
                'last_name'     =>  'Nyu',
                'telephone_area'=>  '949',
                'telephone_num' =>  '444-6666',
                'address_id'    =>  6,
                'major_dept_num'=>  1,
            ],
            [
                'campus_id'     =>  '00004',
                'first_name'    =>  'Alex',
                'last_name'     =>  'Hardin',
                'telephone_area'=>  '714',
                'telephone_num' =>  '444-5454',
                'address_id'    =>  7,
                'major_dept_num'=>  1,
            ],
            [
                'campus_id'     =>  '00005',
                'first_name'    =>  'Lex',
                'last_name'     =>  'Harold',
                'telephone_area'=>  '949',
                'telephone_num' =>  '444-1134',
                'address_id'    =>  8,
                'major_dept_num'=>  2,
            ],
            [
                'campus_id'     =>  '00006',
                'first_name'    =>  'Armen',
                'last_name'     =>  'Hamze',
                'telephone_area'=>  '714',
                'telephone_num' =>  '444-5225',
                'address_id'    =>  9,
                'major_dept_num'=>  2,
            ],
            [
                'campus_id'     =>  '00007',
                'first_name'    =>  'Isaac',
                'last_name'     =>  'Koz',
                'telephone_area'=>  '949',
                'telephone_num' =>  '444-3333',
                'address_id'    =>  10,
                'major_dept_num'=>  2,
            ],
            [
                'campus_id'     =>  '00008',
                'first_name'    =>  'Anthony',
                'last_name'     =>  'Lap',
                'telephone_area'=>  '714',
                'telephone_num' =>  '444-4444',
                'address_id'    =>  11,
                'major_dept_num'=>  2,
            ],
        ];

        $students = $this->table('student');
        $students->insert($data)->saveData();
    }
}
