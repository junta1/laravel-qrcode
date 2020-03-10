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
        width: 35%;
        height: 60%;
        border-radius:50%;
        background-color:#fff;
        position:absolute;
        top:27%;
        left: 32%;
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
        padding: 60px 0px;
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
        padding: 9px 18px;
        border: 1px solid #28a745;
        background-color: #28a745;
        border-radius: 6px;
        outline: none;
        font-size: 18px;
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

    .border-top-left:after {
        content: "";
        position: absolute;
        left: 23%;
        width: 10%;
        height:1.5%;
        background-color:#fff;
    }

    .border-top-left:before {
        content: "";
        position: absolute;
        left: 22%;
        width: 1%;
        height:15%;
        background-color:#fff;
    }

    .border-top-right:after {
        content: "";
        position: absolute;
        left: 68%;
        width: 10%;
        height:1.5%;
        background-color:#fff;
    }

    .border-top-right:before {
        content: "";
        position: absolute;
        left: 78%;
        width: 1%;
        height:15%;
        background-color:#fff;
    }

    .border-bottom-left:after {
        content: "";
        position: absolute;
        left: 23%;
        top:89.5%;
        width: 10%;
        height:1.5%;
        background-color:#fff;
    }

    .border-bottom-left:before {
        content: "";
        position: absolute;
        left: 22%;
        top:76%;
        width: 1%;
        height:15%;
        background-color:#fff;
    }

    .border-bottom-right:after {
        content: "";
        position: absolute;
        left: 68%;
        top:89.5%;
        width: 10%;
        height:1.5%;
        background-color:#fff;
    }

    .border-bottom-right:before {
        content: "";
        position: absolute;
        left: 78%;
        top:76%;
        width: 1%;
        height:15%;
        background-color:#fff;
    }

    .inputfile {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }
    

</style>

<body>

    <div class="jumbotrom">
        <h1>Gerador de QRCODE!</h1>
    </div>

    <div class="border-top-left"></div>
    <div class="border-top-right"></div>
    <div class="border-bottom-left"></div>
    <div class="border-bottom-right"></div>

    <div class="container">
        <div class="first">
            {!! Form::open(array('route' => 'store','method' => 'post', 'files' => true, 'target' => '_blank')) !!}

            {!! Form::file('file',array('class' => 'form-control')) !!}

            {!! Form::submit('Gerar',array('class' => 'btn')) !!}

            {!! Form::close() !!}
        </div>
    </div>

</body>
</html>
