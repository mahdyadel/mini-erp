<?php

namespace App\Http\Requests\Tag;

use Illuminate\Foundation\Http\FormRequest;
use App\Tag;

class UpdateTagRequest extends FormRequest
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
        ];
    }
    public function update($id){

        
        $tag =  Tag::findOrFail($id);


        $tag->name  =  json_encode([

            'ar'    =>  $this->input('ar_name'),
            'en'    =>  $this->input('en_name'),
        ]);

        $tag->save();

     return redirect(route('tags.index'));


}
}
