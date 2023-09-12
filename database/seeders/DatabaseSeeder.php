<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //seeder
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
       //factory
       //Category::factory(10)->create();
       //Store::factory(10)->create();
       //Product::factory(4)->create();

    }
}
