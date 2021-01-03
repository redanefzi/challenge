<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //input data
        $sort = $request->sort;
        $cat = $request->cat;

        // initialise a query builder object
        $products = Product::query();

        $products = $products->with('category');

        // apply sort if specified
        if($sort){
            $products = $products->orderBy($sort);
        }

        // apply filter if specified
        if($cat){
            $products = $products->where('category_id', $cat);
        }

        // return JSON formated data
        return response()->json($products->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //create product from request

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category;
        

        try {
            //save image
            $product->image = $this->saveImage($request);

            $product->save();
            
            return response()->json(["err_name" => "Success", "err_msg" => "Product was created successfully."]);

        } catch (Exception $e) {
            return response()->json(["err_name" => "Error", "err_msg" => "Unable to create a new Product"]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function saveImage(Request $request)
    {
        if($request->hasFile('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time().'.'.$extension;
            $request->file('image')->storeAs('/public/images/',$fileName);

            return $fileName;

        }

        return 'no_img.jpg';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
