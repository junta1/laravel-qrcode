<?php

namespace App\qrcode;

use App\qrcode\Repositorios\UsuarioRepositorio;
use mikehaertl\wkhtmlto\Pdf;

class QrCode
{
    protected $repositorio;

    public function __construct(UsuarioRepositorio $usuarioRepositorio)
    {
        $this->repositorio = $usuarioRepositorio;
    }

    public function importar($input)
    {
        $dados = [];

        $arquivo = $input['file'];

        \Excel::load($arquivo, function ($reader) use (&$dados) {
            $resultados = $reader->get();

            foreach ($resultados as $resultado) {

                array_push($dados, $resultado);
            }
        });

        $itens = [];
        foreach ($dados as $key => $dado) {
            $usuario = $this->repositorio->getWhere($dado['login']);

            $itens[] = $this->tratarEntrada($usuario);
        }

        $qrcode = $this->qrCode($itens);

        return $this->gerarPdf($qrcode, $itens);
    }

    public function tratarEntrada($dados)
    {
        return [
            'id' => $dados['usr_codigo'],
            'nome' => $dados['usr_nome']
        ];
    }

    public function qrCode($itens)
    {
        $qrcode = new \chillerlan\QRCode\QRCode();

        $dados = [];
        foreach ($itens as $item) {
            $dados[] = $qrcode->render($item['id']);
        }

        return $dados;
    }

    protected function gerarPdf(array $dados, array $usuario)
    {
        $view = \View::make('import.gerar-pdf', [
            'dados' => $dados,
            'usuario' => $usuario,
        ])->render();

        $opcoesPdf = [
            'binary' => '/usr/local/bin/wkhtmltopdf',
            'page-width' => '210mm',
            'page-height' => '297mm',
            'dpi' => 96,
            'image-quality' => 100,
            'margin-top' => '35mm',
            'margin-right' => '10mm',
            'margin-bottom' => '12mm',
            'margin-left' => '10mm',
            'orientation' => 'Landscape',
            'page-size' => 'A4',
            'encoding' => 'UTF-8',
            'enable-smart-shrinking',
            'no-outline',
            'print-media-type',
            'header-spacing' => 4,
            'footer-spacing' => 4,
            'footer-left' => 'Qr Code',
            'footer-center' => '[page] de [toPage]',
            'footer-right' => 'Emitido em ' . date('d/m/Y H:i:s'),
            'footer-font-size' => 8,
            'footer-line',
        ];

        $pdf = new Pdf($view);
        $pdf->setOptions($opcoesPdf);

        if (!$pdf->send()) {
            throw new \Exception('Não foi possível criar PDF: '.$pdf->getError());
        }

        return $pdf->send();
    }
}
