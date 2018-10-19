<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmpresa extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [
      'empresa'     => 'required|min:3|max:200',
      'razao'       => 'required|min:3|max:200',
      'cnpj'        => 'required|cnpj',
      'grupo_id'    => 'required|max:11|numeric',
      'endereco_id' => 'max:11|numeric',
      'telefone'    => 'max:15|numeric',
      'celular'     => 'max:15|numeric',
      'ie'          => 'required|min:7|max:15',

      'logradouro'  => 'required|min:3|max:200',
      'bairro'      => 'required|min:3|max:200',
      'cidade'      => 'required|min:3|max:200',
      'uf'          => 'required|numeric',
      'numero'      => 'required|max:11',
      'cep'         => 'required',
    ];
  }
}
}
