<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon;
use App\Attachment;
class Product extends Model
{
    

    public function tags(){

        return $this->hasManyThrough(Tag::class , ProductTag::class ,  'product_id' , 'tag_id');


    }


    public function attachments(){

        return $this->hasMany(Attachment::class );


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

    public function getDescriptionAttribute($value){

        $arr = json_decode($value , true);

        if(app()->isLocale('ar')){

            return $arr['ar'];
        }else{
            return $arr['en'];
        }
    }

    public function getCreateAtAttribute($value){

        return Carbon::parse($value)->diffForHumans();
    }

    // public function getPriceAttribute($value){

    //     return money_format('$ %i' , $value);

    // }
}
