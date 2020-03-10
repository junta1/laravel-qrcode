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
        text-align: center;
    }

    html {
        background-color: #17a2b8;
    }

    .container {
        width: 470px;
        height: 470px;
        border-radius:50%;
        background-color:#fff;
        position:absolute;
        top:30%;
        left: 35%;
        text-align: center;
    }

    .first {
        position:absolute;
        top:45%;
        left: 1%;
        width: 100%;
    }

    .jumbotrom {
        width: 100%;
        background-color: #17a2b8;
        padding: 70px 0px;
    }

    h1 {
        font-size: 4.5rem;
        font-weight: 300;
        line-height: 1.2;
        color: #fff;
        font-family: "Arial";
    }

    .pl {
        padding-left: 20px;
    }

    .mr {
        margin-right: 20px;
    }

    .btn {
        padding: 8px 15px;
        border: 1px solid #28a745;
        background-color: #28a745;
        border-radius: 6px;
        outline: none;
        font-size: 16px;
        color: #fff;
    }

    .btn:hover {
        background-color: #228e3a;
        cursor: pointer;
    }

    .form-control {
        border: 1px solid #aaa;
        border-radius:6px;
        padding: 10px;
    }

    .border-top-left {
        position: absolute;
        left: 30%;
        width: 80px;
        height:8px;
        background-color:#000;
    }

</style>

<body>

    <div class="jumbotrom">
        <h1>Gerador de QRCODE!</h1>
    </div>

{{--    <div class="border-top-left"></div>--}}

    <div class="container">
        <div class="first">
            {!! Form::open(array('route' => 'store','method' => 'post', 'files' => true, 'target' => '_blank')) !!}

            {!! Form::file('file',array('class' => 'form-control')) !!}

            {!! Form::submit('Cadastrar',array('class' => 'btn')) !!}

            {!! Form::close() !!}
        </div>
    </div>

</body>
</html>
