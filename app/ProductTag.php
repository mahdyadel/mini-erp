<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Tag;
use App\Product;

class ProductTag extends Model
{
    //product_id
    //tag_id

    public function product(){

        return $this->belongsTo(Product::class);
    }

    public function tag(){

        return $this->belongsTo(Tag::class);
    }
}
