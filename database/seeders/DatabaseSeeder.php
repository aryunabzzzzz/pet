<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Food;
use App\Models\Image;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
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

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'customer']);

        User::factory()
            ->count(10)
            ->create();

        Food::factory()->count(10)->create()->each(function ($food) {
            $image = Image::factory()->make();
            $food->image()->save($image);
        });

    }
}
