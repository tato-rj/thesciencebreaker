<?php

use Illuminate\Database\Seeder;
use App\Manager;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return Manager::create([
            'first_name' => 'Bart',
            'last_name' => 'Simpson',
            'slug' => 'bart-simpson',
            'email' => 'bart@email.com',
            'division_id' => 1,
            'research_institute' => 'Springfield',
            'image_path' => 'storage/managers/avatars/bart-simpson/bart-simpson.png',
            'is_editor' => true
        ]);
    }
}
