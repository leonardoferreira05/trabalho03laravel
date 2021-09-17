<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConcessionariaRequest extends FormRequest
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
            'titulo' =>'bail | required|min:3|max:100',
            'automovel_id'=>'bail |required|integer',
            'tipo_id'=>'bail |required |integer',
            'finalidade_id'=>'bail | required | integer',
            'preco'=>'bail | required |numeric | min:0',
            'descricao'=>'bail | nullable | string',
             'rua'=>'bail | required | min:1 | max:100',
             'bairro' => ' bail | required | min:3 | max:50',
            'numero'=>'bail | required |integer',
            'cidade' =>'bail |required| string',
            'estado' =>'bail |required| string',
            'proximidades'=>'bail | nullable | array '
        ];
    }
    public function attributes()
    {
        return [
        'automovel_id' => 'automovel',
        'tipo_id' => 'tipo de automovel',
        'finalidade_id'=>'finalidade'
        ];
        
    }
}
