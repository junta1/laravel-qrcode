<?php

namespace App\qrcode\Repositorios;

use App\qrcode\Models\FrUsuarioModel;
use App\qrcode\Models\UsuarioModel;

class UsuarioRepositorio
{
    protected $frUsuario;

    protected $usuario;

    public function __construct(FrUsuarioModel $frUsuarioModel, UsuarioModel $usuarioModel)
    {
        $this->frUsuario = $frUsuarioModel;

        $this->usuario = $usuarioModel;
    }

    public function getWhere($input)
    {
        $frUsuario = $this->frUsuario
            ->where('usr_login', '=', $input)->first();

        $usuario = '';

        if (!empty($frUsuario)) {
            $usuario = $this->usuario
                ->select()
                ->join('unidade', 'usuario.cod_unidade', '=', 'unidade.unid_id')
                ->where('usuario.fr_usuario_usr_codigo', '=', $frUsuario->usr_codigo)
                ->first();
        }

        return $usuario;
    }
}
