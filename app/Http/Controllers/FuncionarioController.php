<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function listarFuncionarios(Request $request){
        $busca = $request->busca;
        $funcionarios = User::where('admin', '=', 0)
            ->where(function($query) use($busca) {
                $query->where('name', 'LIKE', '%'.$busca.'%')
                ->orWhere('email', 'LIKE', '%'.$busca.'%');
            })
            ->orderBy('id', 'DESC')
            ->paginate(10);
        // dd($funcionarios);
        return view('listar_funcionarios', compact('funcionarios'));
    }

    public function excluirFuncionario(Request $request){
        User::find($request->id)->delete();
        return back()->with('status', 'Usuário excluído com sucesso!');
    }

    public function editarFuncionario(Request $request){
        $credenciais = $request->validate([
            'id' => 'required | numeric',
            'name' => 'required | string',
            'email' => 'required | email'
        ]);

        User::find($request->id)->update($credenciais);

        return back()->with('status', 'Usuário editado com sucesso!');
    }
}
