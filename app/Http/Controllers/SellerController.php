<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;
use App\Seller;
use Response;

class SellerController extends Controller
{
    public function index(){
        $sellers = Seller::all();
        return $sellers;
    }
    
    public function show($idSeller){
        $seller = Seller::find($idSeller);
        return $seller;
    }
    
    public function create(Request $request){
        $attributes = $request->all();
        $newSeller = Seller::create($attributes);
        return Response::json($newSeller);
    }
   
    public function update(Request $request, $idSeller){
        $updateSeller = Seller::find($idSeller);
        $attributes =  $request->all();
        $updateSeller->update($attributes);
        return $updateSeller;
    }
    
    public function edit(Request $request, $idSeller){
        $updateSeller = Seller::find($idSeller);
        $attributes = $request->input();
        $updateSeller->update($attributes);
        return response()->json($updateSeller);
    }
   
   
    public function delete($idSeller){
        $removeSeller = Seller::find($idSeller);
        $removeSeller->delete();
        return response()->json($removeSeller);
    }
}
