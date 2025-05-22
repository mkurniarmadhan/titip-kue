<?php

namespace Database\Seeders;

use App\Models\Outlet;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {


    User::create([
      'name' => 'Admin 1',
      'email' => 'admin@gmail.com',
      'password' => bcrypt('password'),
      'role' => 'admin'
    ]);


    $this->call([

      ProductSeeder::class,
      OutletSeeder::class
    ]);
  }
}
