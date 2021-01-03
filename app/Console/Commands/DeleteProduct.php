<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DeleteProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:product {id : The ID of the Product}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete a Product';

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
        try {
            
            $id = $this->argument('id');

            Product::find($id)->delete();
            
            return 0;
        } catch (Exception $e) {
            return 1;
        }
    }
}
