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

        <table class="table table-hover">
            <thead class="thead-dark">
            <tr>
                <th scope="col" style="text-align: center;">nome</th>
                <th scope="col" style="text-align: center;">email</th>
                <th scope="col" style="text-align: center;">cpf</th>
                <th scope="col" style="text-align: center;">Competencias</th>
                <th scope="col" style="text-align: center;">telefone</th>
                <th scope="col" style="text-align: center;">Status</th>
            </tr>
            </thead>

            @foreach ($todoUsuários as $usuario)
                <tbody>
                <tr>
                    <th scope="col" style="text-align: center;">{{ $usuario->nome }}</th>
                    <th scope="col" style="text-align: center;">{{ $usuario->email }}</th>
                    <th scope="col" style="text-align: center;">{{ $usuario->cpf }}</th>
                    <th scope="col" style="text-align: center;">{{ $usuario->competencias }}</th>
                    <th scope="col" style="text-align: center;">{{ $usuario->telefone }}</th>
                    <form method="post" action="{{ route('mudarStatus', ['id' => $usuario->id]) }}">
                        @csrf
                        <th scope="col" style="text-align: center;">
                            <button type="submit">{{ $usuario->status }}</button>
                        </th>
                    </form>
                </tr>
                </tbody>
            @endforeach
        </table>

</body>
</html>
