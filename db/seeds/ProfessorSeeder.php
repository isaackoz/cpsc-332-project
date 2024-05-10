<?php


use Phinx\Seed\AbstractSeed;

class ProfessorSeeder extends AbstractSeed
{
    public function getDependencies(): array
    {
        return [
            'AddressSeeder',
        ];
    }

    public function run() : void
    {
        $data = [
            [
                'ssn'               => '000-000-0000',
                'name'              => 'Professor Hubert',
                'sex'               =>  0,
                'title'             => 'Head of School',
                'salary'            => 100000.00,
                'telephone_area'    => '867',
                'telephone_num'     => '123-4567',
                'address_id'        => 1
            ],
            [
                'ssn'               => '000-000-0001',
                'name'              => 'Professor Wayne',
                'sex'               =>  0,
                'title'             => 'Head of Computer Science',
                'salary'            => 200000.00,
                'telephone_area'    => '949',
                'telephone_num'     => '113-1111',
                'address_id'        => 2
            ],
            [
                'ssn'               => '000-000-0002',
                'name'              => 'Professor Squidette',
                'sex'               =>  1,
                'title'             => 'Head of Science',
                'salary'            => 123455.00,
                'telephone_area'    => '714',
                'telephone_num'     => '123-4456',
                'address_id'        => 3
            ],
        ];

        $professor = $this->table('professor');
        $professor->insert($data)->saveData();
    }
}
