<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'key', 'funcion', 'descripcion',
    ];

    /**
     * Método que muestra los Users asociados
     *
     * Puede usarse de forma static como: Role::with('user')->get(),
     * o con un objeto como: $this->user; sin paréntesis, como
     * un atributo. Siempre que exista una relación.
     *
     * @return App\User
     */
    public function user()
    {
        return $this->hasMany('App\User', 'role_id');
        // role_id pertenece a User, es innecesario con este formato.
    }
}
