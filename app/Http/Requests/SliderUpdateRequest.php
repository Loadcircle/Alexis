<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderUpdateRequest extends FormRequest
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
            'file'          => 'nullable|mimes:png,jpeg|max:3000|dimensions:max_width=3000,max_height=3000',
            'tittle'        => 'max:255',
            'position'      => 'required|integer',
            'status'        => 'required|in:ACTIVE,INACTIVE'
        ];
    }
}
