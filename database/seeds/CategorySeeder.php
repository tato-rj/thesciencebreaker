<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Category::create(['name' => 'Health & Physiology', 'slug' => 'health-physiology']);
            Category::create(['name' => 'Neurobiology', 'slug' => 'neurobiology']);
            Category::create(['name' => 'Earth & Space', 'slug' => 'earth-space']);
            Category::create(['name' => 'Evolution & Behaviour', 'slug' => 'evolution-behaviour']);
            Category::create(['name' => 'Plant Biology', 'slug' => 'plant-biology']);
            Category::create(['name' => 'Microbiology', 'slug' => 'microbiology']);
            Category::create(['name' => 'Maths, Physics & Chemistry', 'slug' => 'maths-physics-chemistry']);
            Category::create(['name' => 'Psychology', 'slug' => 'psychology']);
    }
}
