<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateCategory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:category {name : The name of the Category}
    {--catid= : Parent Category ID}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Category';

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
     * @return int
     */
    public function handle()
    {
        // Retrieve Category name
        $name = $this->argument('name');

        // Retrieve parent Category ID
        $catid = $this->option('catid');

        $category = new Category;
        
        $category->name = $name;

        if($catid){
            $category->category_id = $catid;
        }

        $category->save();

        return $category->id;
    }
}
