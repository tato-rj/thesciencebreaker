<?php

use Illuminate\Database\Seeder;
use App\Author;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::create([
            'first_name' => 'Brian',
            'last_name' => 'Griffin',
            'slug' => 'brian-griffin',
            'email' => 'brian@email.com',
            'position' => 'Student',
            'research_institute' => 'Quahog',
        ]);
    }
}
