<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;
use App\Seller;
use Response;


class AddressController extends Controller
{
        
    public function create(Request $request, $idSeller){
        
        $attributes = $request->all();
        $seller = Seller::with('address')->find($idSeller);
        $address = Address::create($attributes);
        $seller-> address_id = $address->id;
        
        return Response::json($seller);
    }
   
    public function update(Request $request, $idSeller){
       
        $attributes = $request->all();
        $updateAddress = Address::with('seller')->find($idSeller);
        $updateAddress->update($attributes);
        
        return $updateAddress
    }
}
