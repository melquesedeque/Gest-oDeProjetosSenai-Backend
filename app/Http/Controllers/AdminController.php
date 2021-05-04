<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller{

    public function listarUsuarios(){
        $todoUsuários = User::orderBy('nome')->get();

        $dados = ['todoUsuários'=> $todoUsuários];
        return view('list', $dados);
    }

    public function mudarStatus($id){
        $verificarStatus = User::select('status')->where('id',$id)->first(); //Busca o 'Status' do Usuário no banco
        try {
            if($verificarStatus->status === 'Não validado'){
                User::where('id', $id)->update([
                    'status' => 'Valido',
                ]);
            }else{
                User::where('id', $id)->update([
                    'status' => 'Não validado',
                ]);
            }
        }catch (Throwable $th){
            return redirect()->back()->withInput()->withErrors("Erro ao Cadastrar Usuário!");
        }

        return redirect()->back();
    }

}
