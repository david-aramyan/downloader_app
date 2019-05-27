<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            0 => [
                'id'           => 1,
                'name'         => 'Pending',
            ],
            1 => [
                'id'           => 2,
                'name'         => 'Downloading',
            ],
            2 => [
                'id'           => 3,
                'name'         => 'Complete',
            ],
            3 => [
                'id'           => 4,
                'name'         => 'Failed',
            ]
        ]);
    }
}
