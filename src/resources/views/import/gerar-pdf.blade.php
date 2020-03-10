<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<style>
    .container {
        display: flex;
        justify-content: space-around;
    }

    .align {
        text-align: center;
        padding: 15px;
    }
</style>

<body>

<div class="container">
    @foreach($dados as $key => $dado)
        <div class="align">
            <img src="{{$dado}}">
            <br>
            <b>{!! $usuario[$key]['nome'] !!}</b>
        </div>
    @endforeach
</div>


</body>
</html>
