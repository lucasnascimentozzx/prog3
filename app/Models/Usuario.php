<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    use Notifiable;
    public function getAuthIdentifierName ()
    {
        return 'id';
    }
    public function getAuthIdentifier ()
    {
        return $this->id;
    }
    public function getAuthPassword ()
    {
        return $this->password;
    }
    public function getRememberToken ()
    {
        return $this->remember_token;
    }
    public function setRememberToken ($valor)
    {
        $this->remember_token = $valor;
        return $valor;
    }
    public function getRememberTokenName ()
    {
        return 'remember_token';
    }

    public $timestamps = false;
    
    protected $hidden = [
        'password',
       ];
}
