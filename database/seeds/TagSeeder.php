<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create(['name' => 'overfishing']);
        Tag::create(['name' => 'rays']);
        Tag::create(['name' => 'molecules']);
    }
}
