<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'date' => '2020-11-03',
            'client_number' => '1',
            'service' => 'SVS1',
        ]);

        User::create([
            'date' => '2020-11-02',
            'client_number' => '2',
            'service' => 'SVS2',
        ]);

        User::create([
            'date' => '2020-11-02',
            'client_number' => '3',
            'service' => 'SVS3',
        ]);

        User::create([
            'date' => '2020-11-01',
            'client_number' => '4',
            'service' => 'SVS2',
        ]);

        User::create([
            'date' => '2020-11-01',
            'client_number' => '4',
            'service' => 'SVS3',
        ]);
    }
}
