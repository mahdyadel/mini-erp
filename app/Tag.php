<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
      

    public function products(){

        return $this->hasManyThrough( Product::class , ProductTag::class ,  'tag_id' , 'product_id' );

        
    }

    public function getByLocale($locale = 'en' , $attr = 'name'){

        $arr = json_decode($this->getRawOriginal($attr) , true);

        return $arr[$locale];
    }

    public function getNameAttribute($value){

        $arr = json_decode($value , true);

        if(app()->isLocale('ar')){

            return $arr['ar'];
        }else{
            return $arr['en'];
        }
    }
}
