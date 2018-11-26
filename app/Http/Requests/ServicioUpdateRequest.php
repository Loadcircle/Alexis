<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicioUpdateRequest extends FormRequest
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
            'titulo' => 'required|max:128',
            'slug' => 'required|max:128|unique:servicios,slug,' .$this->servicio,
            'contenido' => 'required',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin' => 'nullable|date',
            'file' => 'nullable|mimes:png,jpeg|max:1500|dimensions:max_width=1500,max_height=750',
            'tipo_servicio_id' => 'required|integer',
            'status' => 'required|in:ACTIVE,INACTIVE'
        ];
    }
}
