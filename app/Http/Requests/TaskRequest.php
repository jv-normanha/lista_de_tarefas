<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // usuario nao necessita de autenticação
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'description'=>'required',//Aqui nós poderiamos fazer as nossas regras de validação
            'date'=>'required|date',//Aqui nós poderiamos fazer as nossas regras de validação
            'user_id'=>'required'//Aqui nós poderiamos fazer as nossas regras de validação
        ];
    }
}
