<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

@foreach($dados as $dado)
    <img src="{{$dado}}">
@endforeach

</body>
{{--{!! dd($dados) !!}--}}
</html>
