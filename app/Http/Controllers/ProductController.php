<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Seller;
use App\Tag;
use APP\Review;
use Response;

class ProductController extends Controller
{
    public function index(){
        $products = Product::with('seller')->with('tags')->get();
        return Response::json($products);
    }
    
    public function show($idProduct){
        $product = Product::with('seller')->with('tags')->findOrFail($idProduct);
         return Response::json($product);
    }
    
    public function create(Request $request){
        $productAttributes = $request->all();
        $newProduct = Product::create($productAttributes);
        $tags = $request->input('tags');
        
        foreach($tags as $tagData){
            $tag = Tag::where('name', trim($tagData))->first();
            if(is_null($tag)){
                $tagAttributes = $tag->name=$tagData;
                $newTag = Tag::create($tagAttributes);
            }
             $newProduct->tags()->attach($tag->id);
        }
                
        return Response::json($newProduct);
    }   
   
    public function update(Request $request, $idProduct){
        $updateProduct = Product::findOrFail($idProduct);
        $attributes =  $request->all();
        $updateProduct->update($attributes);
        return Response::json($updateProduct);
    }
    
    public function edit(Request $request, $idProduct){
        $updateProduct = Product::findOrFail($idProduct);
        $attributes = $request->all();
        $updateProduct->update($attributes);
        return Response::json($updateProduct);
    }
      
    public function delete($idProduct){
        $removeProduct = Product::finOrFail($idProduct);
        $removeProduct->delete();
        Review::where('product_id', $idProduct)->delete();
        
        return Response::json($removeProduct);
    }
}
