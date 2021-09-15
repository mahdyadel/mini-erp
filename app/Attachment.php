<?php

namespace App;

use App\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Attachment extends Model
{

    protected $guarded = [];

    public function getUrlAttribute($value){

        return Storage::url($value);
    }
 
    public function product(){

        return $this->belongsTo(Product::class);
    }
}
