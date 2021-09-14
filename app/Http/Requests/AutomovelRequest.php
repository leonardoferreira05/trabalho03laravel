<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutomovelRequest extends FormRequest
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
            'fabricante' => "bail|required|min:3|max:100|unique:automovel,fabricante,$this->fabricante",
            'modelo' => "required|min:2|max:100,modelo,$this->id",
            'cor' => 'required|min:3|max:50'
            //
        ];
    }
}
