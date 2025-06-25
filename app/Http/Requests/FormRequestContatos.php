<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestContatos extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    //  Adicionando uma estrutura

    public function rules(): array
    {

        // Inicializa o Array de regras
        $request = [];

        // Verifica se o método é POST ou PUT. Valida os campos se estiver inserindo dados..

        if ($this->method() == 'POST' || $this->method() == 'PUT'){
            $request = [ 
                'nome' => 'required|string|max:255',
            'numero' => 'required|regex:/^\(\d{2}\)\s\d{4,5}-\d{4}$/', // Validação do telefone
            'email' => ['required', 'email', 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'],
            ];

        }

    // Retorna o array das regras (seja vazio ou com regras )
        return $request; 

    }
}
