<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<style>
    .container {
        display: inline-block;
        width: 24%;
        height: 280px;
        justify-content: space-evenly;
        margin-bottom: 25px;
    }

    .align {
        text-align: center;
    }

    b {
        font-size: 11px;
    }
</style>

<body>

@foreach($dados as $key => $dado)
    <div class="container">
        <div class="align">
            <img src="{{$dado}}">
        </div>

        <div class="align">
            <b>{!! $usuario[$key]['nome'] !!}</b>
        </div>

        <div class="align">
            <b>{!! $usuario[$key]['diretoria'] !!}</b>
        </div>
    </div>
@endforeach

</body>
</html>
