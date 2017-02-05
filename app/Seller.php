<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $fillable = ['first_name','last_name','address_id'];

    public function address(){
        return $this->hasOne('App\Address');
    }

    public function products(){
        return $this->hasMany('App\Product');
    }
}
