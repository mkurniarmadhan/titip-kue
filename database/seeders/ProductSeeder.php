<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $data = [
            ['name' => 'Klepon', 'price' => 3000],
            ['name' => 'Lemper', 'price' => 3500],
            ['name' => 'Nagasari', 'price' => 4000],
            ['name' => 'Dadar Gulung', 'price' => 3500],
            ['name' => 'Onde-onde', 'price' => 4000],
            ['name' => 'Serabi', 'price' => 5000],
            ['name' => 'Putri Ayu', 'price' => 3000],
            ['name' => 'Kue Lapis', 'price' => 4000],
            ['name' => 'Kue Talam', 'price' => 3500],
            ['name' => 'Apem', 'price' => 3000],
            ['name' => 'Bolu Kukus', 'price' => 4000],
            ['name' => 'Wajik', 'price' => 3500],
            ['name' => 'Getuk', 'price' => 3000],
            ['name' => 'Kue Bugis', 'price' => 3500],
            ['name' => 'Kue Cucur', 'price' => 3000],
        ];



        DB::table('products')->insert($data);
    }
}
