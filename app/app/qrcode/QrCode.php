<?php

namespace App\qrcode;

class QrCode
{
    public function definindoCodigo()
    {
        $qrcode = new \chillerlan\QRCode\QRCode();

        $data = 'https://imasters.com.br/back-end/criando-qr-codes-em-php-com-o-chillerlan-php-qrcode';

        return $qrcode->render($data);
    }
}