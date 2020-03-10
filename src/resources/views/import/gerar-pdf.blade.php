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
        width: 33%;
        height: 280px;
        justify-content: space-evenly;
        margin-bottom: 25px;
    }
    .align {
        text-align: center;
        height: 280px;
    }
</style>

<body>

@foreach($dados as $key => $dado)
<div class="container">
    <div class="align">
        <img src="{{$dado}}">
        <b>{!! $usuario[$key]['nome'] !!}</b>
    </div>
</div>
@endforeach


</body>

</html>
