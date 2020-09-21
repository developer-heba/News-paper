<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddsRequest extends FormRequest
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
            'name'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             'magazine_id' => 'required',
           
        ];
    }
    public function  messages()
    {
        return [
            'name.required'=>'Adds name is required',
            'image.required' => 'Adds image is required',
            'image.image' => 'Adds image must be image',
            'image.mimes' => 'Adds image extentions must be jpeg or png or jpg or gif or svg',
            'image.max' => 'Adds image size must be lessthan 2048',
              'magazine_id.required' => ' magazine is required',
           
        ];
    }
}
