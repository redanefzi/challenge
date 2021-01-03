<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:product {name : The name of the Category}
    {--description= : Product description}
    {--price= : Product price}
    {--image= : Product image URL}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Product';

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
        // Retrieve product name
        $name = $this->argument('name');

        // Retrieve product description
        $description = $this->option('description');

        // Retrieve product price
        $price = $this->option('price');

        // Retrieve product image
        $image = $this->option('image');

        $product = new Product;
        $product->name = $name;
        $product->description = $description;
        $product->price = $price;
        $product->image = $image;

        try {

            $product->save();

            return $product->id;

        } catch (Exception $e) {

            echo "Input Error";

        }
        
    }
}
