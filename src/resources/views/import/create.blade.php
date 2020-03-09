<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

{!! Form::open(array('route' => 'store','method' => 'post', 'files' => true, 'target' => '_blank')) !!}

{!! Form::file('file') !!}

{!! Form::submit('Cadastrar',array('class' => 'btn btn-success', )) !!}

{!! Form::close() !!}
</body>
</html>
