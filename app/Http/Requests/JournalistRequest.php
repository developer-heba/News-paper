<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JournalistRequest extends FormRequest
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
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           
        ];
    }
    public function  messages()
    {
        return [
            'name.required'=>'journalist name is required',
            'logo.required' => 'journalist logo is required',
            'logo.image' => 'journalist logo must be image',
            'logo.mimes' => 'journalist logo extentions must be jpeg or png or jpg or gif or svg',
            'logo.max' => 'journalist logo size must be lessthan 2048',
           
        ];
    }
}
