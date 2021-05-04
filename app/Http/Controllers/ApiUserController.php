<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ApiUserController extends Controller{

    public function listarUsuarios(){
        $todoUsuarios = User::orderBy('nome')->get();
        return response()->json(['result'=>$todoUsuarios]);
    }

    public function filtrarPorNome($nome){
        $todoUsuarios = User::where('nome', 'like', '%'.$nome.'%')->orderBy('nome')->get();
        return response()->json(['result'=>$todoUsuarios]);
    }

    public function registarUsuario(Request $requestUser){

        // Tratar CPF
        $requestUser->cpf = str_replace('.', '', $requestUser->cpf);
        $requestUser->cpf = str_replace('-', '', $requestUser->cpf);

        // Tratar Telefone
        if(isset($requestUser->telefone)){
            $requestUser->telefone = str_replace('(', '', $requestUser->telefone);
            $requestUser->telefone = str_replace(')', '', $requestUser->telefone);
            $requestUser->telefone = str_replace('-', '', $requestUser->telefone);
            $requestUser->telefone = str_replace(' ', '', $requestUser->telefone);
        }

        // Verifica se 'CPF' já foi cadastrado
        if(User::where('cpf',$requestUser->cpf)->exists()){
            return response()->json(['error'=>"CPF já Cadastrado"]);
        }

        //Salvar os dados no banco
        try {
            $user = new User();
            $user->nome = $requestUser->nome;
            $user->email = $requestUser->email;
            $user->cpf = $requestUser->cpf;
            $user->competencias = $requestUser->competencia;
            $user->telefone = $requestUser->telefone;
            $user->save();

            return response()->json(['success' => true]);
        }catch (\Throwable $th){
            return response()->json(['success' => False]);
        }
    }

    public function mudarStatus($id){
        $verificarStatus = User::select('status')->where('id',$id)->first(); //Busca o 'Status' do Usuário no banco
        try {
            if($verificarStatus->status === 'Não validado'){
                User::where('id', $id)->update([
                    'status' => 'Validado',
                ]);
            }else{
                User::where('id', $id)->update([
                    'status' => 'Não validado',
                ]);
            }
        }catch (Throwable $th){
            return response()->json(['success' => False]);
        }

        return response()->json(['success' => true]);
    }


}
