<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','price','description','seller_id'];

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    public function seller(){
        return $this->belongsTo('App\Seller');
    }

    public function reviews(){
        return $this->hasMany('App\Review');
    }

}
