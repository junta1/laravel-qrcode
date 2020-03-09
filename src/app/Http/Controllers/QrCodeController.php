<?php

namespace App\Http\Controllers;

use App\qrcode\QrCode;
use Illuminate\Http\Request;

class QrCodeController extends Controller
{
    protected $servico;

    public function __construct(QrCode $code)
    {
        $this->servico = $code;
    }

    public function index()
    {
        return view('import.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $dados = $this->servico->import($input);

        return $dados;
    }
}
