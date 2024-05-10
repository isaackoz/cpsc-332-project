<?php


use Phinx\Seed\AbstractSeed;

class AddressSeeder extends AbstractSeed
{
    public function run() : void
    {
        $data = [
            [
                'street'    => '123 Conch Lane',
                'city'      => 'Irvine',
                'state'     => 'CA',
                'zip'       => '92680'
            ],
            [
                'street'    => '873 Lol Lane',
                'city'      => 'Foothill Ranch',
                'state'     => 'CA',
                'zip'       => '92610'
            ],
            [
                'street'    => '33 Super Avenue',
                'city'      => 'Fullerton',
                'state'     => 'CA',
                'zip'       => '92616'
            ],
            [
                'street'    => '31 Monserrat Pl',
                'city'      => 'Newport Beach',
                'state'     => 'CA',
                'zip'       => '86876'
            ],
            [
                'street'    => '99933 Swan Lane',
                'city'      => 'Laguna Beach',
                'state'     => 'CA',
                'zip'       => '24288'
            ],
            [
                'street'    => '73473 Kite Ave',
                'city'      => 'Fullerton',
                'state'     => 'CA',
                'zip'       => '77857'
            ],
            [
                'street'    => '343 Linden Ave',
                'city'      => 'Lake Forest',
                'state'     => 'CA',
                'zip'       => '788778'
            ],
            [
                'street'    => '14144 Edward Lane',
                'city'      => 'Westminster',
                'state'     => 'CA',
                'zip'       => '92929'
            ],
            [
                'street'    => '99222 Garfield Ave',
                'city'      => 'Huntington',
                'state'     => 'CA',
                'zip'       => '785756'
            ],
            [
                'street'    => '44 Squidward Lane',
                'city'      => 'Seal Beach',
                'state'     => 'CA',
                'zip'       => '92626'
            ],
            [
                'street'    => '99 Tree Road',
                'city'      => 'La Habra',
                'state'     => 'CA',
                'zip'       => '97999'
            ],
        ];

        $address = $this->table('address');
        $address ->insert($data)->saveData();
    }
}
