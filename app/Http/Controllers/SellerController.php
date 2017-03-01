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
        return Response::json($sellers);
    }
    
    public function show($idSeller){
        $seller = Seller::findOrFail($idSeller);
        return Response::json($seller);
    }
    
    public function create(Request $request){
        $attributes = $request->all();
        $newSeller = Seller::create($attributes);
        return Response::json($newSeller);
    }   
   
    public function update(Request $request, $idSeller){
        $updateSeller = Seller::findOrFail($idSeller);
        $attributes =  $request->all();
        $updateSeller->update($attributes);
        return Response::json($updateSeller);
    }
    
    public function edit(Request $request, $idSeller){
        $updateSeller = Seller::findOrFail($idSeller);
        $attributes = $request->all();
        $updateSeller->update($attributes);
        return Response::json($updateSeller);
    }
   
   
    public function delete($idSeller){
        $removeSeller = Seller::find($idSeller);
        $removeSeller->delete();
        return Response::json($removeSeller);
    }
}
