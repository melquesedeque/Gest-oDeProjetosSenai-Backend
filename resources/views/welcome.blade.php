<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestão de Processos SENAI</title>
</head>
<body>

@if ($errors->all())
    @foreach ($errors->all() as $erro)
        <div class="alert alert-danger" role="alert">
            {{ $erro }}
        </div>
    @endforeach
@endif
    <form method="post" action="{{ route('registarUsuario') }}">
        @csrf
        <div>
            <label for="nome">Nome</label>
            <input type="text" name="nome">

            <label for="email">email</label>
            <input type="email" name="email">

            <label for="cpf">cpf</label>
            <input type="text" name="cpf">

            <label for="">competencia</label>
            <select name="competencia[]" multiple data-live-search="true">
                <option value="GerenciaDeProjetos">Gerência de Projetos</option>
                <option value="ControleFinanceiro">Controle Financeiro</option>
                <option value="DesenvolvimentoFront-end">Desenvolvimento Front-end</option>
                <option value="BancoDeDados">Banco de Dados</option>
                <option value="DesenvolvimentoBack-end">Desenvolvimento Back-end</option>
                <option value="DevOps">DevOps</option>
            </select>

            <label for="telefone">telefone</label>
            <input type="text" name="telefone">
        </div>
        <div>
            <button type="submit">Salvar</button>
        </div>
    </form>
</body>
</html>
