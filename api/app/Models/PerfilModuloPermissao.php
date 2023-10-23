<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class PerfilModuloPermissao extends Model
{
    use Authenticatable, Authorizable, HasFactory;

    protected $table = 'perfil_modulo_permissoes';
    
    protected $fillable = [
        'id', 'perfil_id', 'modulo_id', 'permissao_id', 'created_at', 'updated_at'
    ];


}
