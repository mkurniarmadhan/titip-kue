<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        


        for ($i=0; $i < 5; $i++) { 
            # code...
            DB::table('outlets')->insert([
                'name'=> "OUTLET $i",
                'address'=> fake('id_ID')->address
            ]);
        }


    }
}
