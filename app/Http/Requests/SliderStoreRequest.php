<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderStoreRequest extends FormRequest
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
            'file'          => 'required|mimes:png,jpeg|max:3000|dimensions:max_width=2500,max_height=1250',
            'tittle'        => 'max:255',
            'position'      => 'integer',
            'status'        => 'required|in:ACTIVE,INACTIVE'
        ];
    }
}
