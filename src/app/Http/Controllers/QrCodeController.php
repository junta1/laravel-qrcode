<?php

namespace App\Http\Controllers;

use App\qrcode\QrCode;

class QrCodeController extends Controller
{
    protected $qrcode;

    public function __construct(QrCode $code)
    {
        $this->qrcode = $code;
    }

    public function index()
    {
        $dados = $this->qrcode->definindoCodigo();

        return view('qrcode.index', compact('dados'));
    }
}