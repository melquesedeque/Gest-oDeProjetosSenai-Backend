<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller{

    public function registarUsuario(Request $requestUser) {

        $competencias = implode(",", $requestUser->competencia);// Converter Array em String

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
            return redirect()->back()->withInput()->withErrors("CPF já Cadastrado");
        }

        //Salvar os dados no banco
        try {
            $user = new User();
            $user->nome = $requestUser->nome;
            $user->email = $requestUser->email;
            $user->cpf = $requestUser->cpf;
            $user->competencias = $competencias;
            $user->telefone = $requestUser->telefone;
            $user->save();

            return json_encode(['success' => true]);
        }catch (\Throwable $th){
            return json_encode(['Erro' => False]);
        }

    }
}
