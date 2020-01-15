<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    //
    protected $guarded = [];

    /**
     * Devuelve los autores del libro ... si los hay.
     *
     * @return \App\Modelos\Autor
     */
    public function autores()
    {
        return $this->belongsToMany('App\Modelos\Autor', 'autor_libro', 'libro_id', 'autor_id');
    }
}
