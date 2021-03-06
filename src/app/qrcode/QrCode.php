<?php

namespace App\qrcode;

use App\qrcode\Repositorios\UsuarioRepositorio;
use chillerlan\QRCode\QROptions;
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

        $usuarioNaoEncontrado = [];
        $itens = [];
        foreach ($dados as $key => $dado) {
            $usuario = $this->repositorio->getWhere($dado['login']);

            if (empty($usuario)) {
                $usuarioNaoEncontrado[] = $dado['login'];
                continue;
            }

            $itens[] = $this->tratarEntrada($usuario);
        }

        $qrcode = $this->qrCode($itens);

        return $this->gerarPdf($qrcode, $itens);
    }

    public function tratarEntrada($dados)
    {
        return [
            'id' => $dados['fr_usuario_usr_codigo'],
            'nome' => $dados['usua_nome'],
            'diretoria' => $dados['unid_sigla']
        ];
    }

    public function qrCode($itens)
    {
        $options = new QROptions([
            'scale'    => 6
        ]);

        $qrcode = new \chillerlan\QRCode\QRCode($options);

        $dados = [];
        foreach ($itens as $item) {
            $dados[] = $qrcode->render('idUsuario='.$item['id']);
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
            'margin-top' => '5mm',
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
            throw new \Exception('Não foi possível criar PDF: ' . $pdf->getError());
        }

        return $pdf->send();
    }
}
