<?php


use Phinx\Seed\AbstractSeed;

class Test extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run(): void
    {
        $data = [
            [
                'name'=> 'Hello1',
            ],
            [
                'name'=> 'hello2'
            ]
            ];

        $test = $this->table('test');
        $test->insert($data)
            ->saveData();
    }
}
