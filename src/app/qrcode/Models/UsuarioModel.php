<?php

namespace App\qrcode\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuario';

    protected $primaryKey = 'usua_id';

    public $connection = 'novoPolo';
}
