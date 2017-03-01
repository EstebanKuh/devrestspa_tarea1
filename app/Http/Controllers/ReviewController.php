<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Review;
use Response;

class ReviewController extends Controller
{
    public function index($idProduct){
        $product = Product::with('reviews')->findOrFail($idProduct);
        return Response::json($product->reviews);
    }
    
    public function create(Request $request, $idProduct){
        $attributes = $request->all();
        $product = Product::findOrFail($idProduct);
        $newReview = Review::create($attributes);
        $newReview->product()->associate($product);
        $newReview->save();
        return Response::json($newReview);
    }   
   
    public function delete($idProduct, $idReview){
        $removeReview = Review::findOrFail($idReview);
        $removeReview->delete();
        return response()->json($removeReview);
    }
}
