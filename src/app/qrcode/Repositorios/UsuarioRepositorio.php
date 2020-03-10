<?php

namespace App\qrcode\Repositorios;

use App\qrcode\Models\UsuarioModel;

class UsuarioRepositorio
{
    protected $model;

    public function __construct(UsuarioModel $usuarioModel)
    {
        $this->model = $usuarioModel;
    }

    public function getWhere($input)
    {
        $model = $this->model->where('usr_login', '=', $input);

        return $model->first();
    }
}
