<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name'=>'salad']);
        Category::create(['name'=>'pizza']);
        Category::create(['name'=>'dessert']);
        Category::create(['name'=>'drink']);
        Category::create(['name'=>'soup']);
    }
}
