<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\DB;
use App\ContasPagar;
use Illuminate\Support\Facades\Validator;

class ContasPagarController extends Controller
{
    public function listar()
    {
        $contas_pagar = ContasPagar::all();
        return view('listar')->with('contas_pagar', $contas_pagar);
    }

    public function cadastrar()
    {
        return view('cadastro');
    }

    public function salvar()
    {
        $descricao = Request::input("descricao");
        $valor = Request::input("valor");
        
        $validate = Validator::make([
            'descricao' => $descricao,
            'valor' => $valor            
        ], [
            'descricao' => 'required|min:6',
            'valor' => 'required|numeric'
        ], [
            'required' => ':attribute é obrigatório.',
            'numeric' => ':attribute precisa ser numerico.',
            'min' => ':attribute precisa ter mais caracteres.'            
        ]);
        
        if ($validate->fails()) {
            return redirect()->action('ContasPagarController@cadastrar')->withErrors($validate)->withInput();
        }

        $ContasPagar = new ContasPagar();
        $ContasPagar->descricao = $descricao;
        $ContasPagar->valor = $valor;
        $ContasPagar->save();        

        return redirect()->action('ContasPagarController@listar')->withInput();
    }
    
    public function editar($id)
    {
        $contas_pagar = ContasPagar::find($id);
        if (empty($contas_pagar)) {
            return 'Id não encontrado';
        }
        return view('editar')->with('contas_pagar', $contas_pagar);
    }

    public function update($id)
    {
        $descricao = Request::input("descricao");
        $valor = Request::input("valor");

        $ContasPagar = ContasPagar::find($id);
        $ContasPagar->descricao = $descricao;
        $ContasPagar->valor = $valor;
        $ContasPagar->save();        

        return redirect()->action('ContasPagarController@listar');
    }

    public function apagar($id)
    {
        $contas_pagar = ContasPagar::find($id);
        $contas_pagar->delete();
        return redirect()->action('ContasPagarController@listar');        
    }
}
