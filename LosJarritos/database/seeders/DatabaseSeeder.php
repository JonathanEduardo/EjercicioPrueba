<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Product;
use \App\Models\Vendor;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();
        Product::factory(50)->create();
        Vendor::factory(30)->create();
    }
}
