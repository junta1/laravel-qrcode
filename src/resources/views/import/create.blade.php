<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<style>

* {
    margin:0;
    padding:0;
}

.container {
    width: 100%;
    height:100%;
}

    .btn {
        padding: 8px;
        border: 1px solid #aaa;
        background-color: #f8f9fa;
        border-radius: 6px;
        outline: none;
    }

    .btn:focus {
        border: 1px solid #5f5f5f;
        transition: 0.50s;
        box-shadow: 0 0 2px #655e5e;
    }

    .btn:hover {
        background-color: #e2e6ea;
        cursor: pointer;
    }

</style>

<body>

<div class="container">
{!! Form::open(array('route' => 'import.store','method' => 'post', 'files' => true, 'target' => '_blank')) !!}

{!! Form::file('file') !!}

{!! Form::submit('Cadastrar',array('class' => 'btn')) !!}

{!! Form::close() !!}
</div>



</body>

</html>
