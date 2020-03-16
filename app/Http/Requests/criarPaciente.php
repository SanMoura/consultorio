<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class criarPaciente extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return true;
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cpf' => 'required|unique:paciente',
            'rg' => 'required|unique:paciente',
        ];
    }

    public function messages()
{
    return [
        'cpf.unique' => 'Já existe um paciente com esse mesmo CPF',
        'rg.unique'  => 'Já existe um paciente com esse mesmo RG',
    ];
}
}
