<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use App\Events\Product\ProductHasBeanCreated;
use Illuminate\Support\Facades\DB;
use App\Product;

class CreateProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
            'en_name'           =>      'required|string|min:2',
            'ar_name'           =>      'required|string|min:2',
            'en_description'    =>      'required|string|min:10',
            'ar_description'    =>      'required|string|min:10',
            'price'             =>      'required|numeric',
            'attachments'        =>      'required|array',
            'attachments.*'        =>      'required|file',
        
        ];
    }

    
    public function store(){

      DB::beginTransaction();
      try{
           
        $product = new Product;


        $product->name  =  json_encode([

            'ar'    =>  $this->input('ar_name'),
            'en'    =>  $this->input('en_name'),
        ]);

        $product->description  =  json_encode([

            'ar'    =>  $this->input('ar_description'),
            'en'    =>  $this->input('en_description'),
        ]);

        $product->price   =   $this->input('price');

        $product->save();


        //Save Faile

             
        foreach($this->file('attachments') as  $key => $file){
            $is_master = false;
            if($key == 0)   $is_master = true;
            

            $path = $file->store('attachments');
            $product->attachments()->create([
                'url'   =>  $path,
                'is_master' => $is_master,
            ]);

        }

        //flash Event
        DB::commit();
        event(new ProductHasBeanCreated($product));
        return redirect(route('products.index'));


      }catch(\Exception $exception){
          DB::rollBack();
          return redirect()->back()->withErrors('error!');
        }
    }
}
