<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['reviewer_name','title','content','review_created_at','product_id'];

    public function product(){
        return $this->belongsTo(Product::class);
    }

}
