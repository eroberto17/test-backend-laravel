<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Collection;

class CollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Collection::create([
            'date' => '2020-11-03',
            'client_number' => '1',
            'service' => 'SVS1',
            'price' => '11.55',
        ]);

        Collection::create([
            'date' => '2020-11-02',
            'client_number' => '2',
            'service' => 'SVS2',
            'price' => '12.55',
        ]);

        Collection::create([
            'date' => '2020-11-02',
            'client_number' => '3',
            'service' => 'SVS3',
            'price' => '13.55',
        ]);

        Collection::create([
            'date' => '2020-11-01',
            'client_number' => '4',
            'service' => 'SVS2',
            'price' => '12.55',
        ]);

        Collection::create([
            'date' => '2020-11-01',
            'client_number' => '4',
            'service' => 'SVS3',
            'price' => '13.55',
        ]);
    }
}
