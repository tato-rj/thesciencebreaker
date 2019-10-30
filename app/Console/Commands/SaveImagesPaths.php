<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SaveImagesPaths extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'temp:save-paths';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Save all image paths to database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        foreach (\App\Article::all() as $article) {
            $article->update(['image_path' => $article->paths()->image()]);
        }
    }
}
