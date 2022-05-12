<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            [
            'name' => 'Sample Product',
            'code' => 'AAAA1',
            'desc' => 'Sample Product Description.',
            'price' => '99.99',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'photo' => 'default',
            'user_id' => '1'
            ],

            [
            'name' => 'Example Product',
            'code' => 'BBBB2',
            'desc' => 'Example Product Description.',
            'price' => '69.99',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'photo' => 'default',
            'user_id' => '1'
            ]
        ]);

    }
}
