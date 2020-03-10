<?php

namespace App\qrcode\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioModel extends Model
{
    protected $table = 'fr_usuario';

    protected $primaryKey = 'usr_codigo';

    public $connection = 'pgsql';
}
