<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration{

    public function up(){
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 255);
            $table->string('email',255);
            $table->string('cpf', 14)->unique();
            $table->string('competencias', 255);
            $table->string('telefone', 20)->nullable($value = true);
            $table->string('status', 12)->default('Não validado');
        });
    }

    public function down(){
        Schema::dropIfExists('users');
    }
}
