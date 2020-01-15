<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    //
    // Tabla asociada. Por defecto sería 'autors'.
    protected $table = 'autores';
    protected $guarded = [];

    /**
     * Variables static y sus métodos.
     */
    protected static $anonimo = "Anónimo";
    protected static $valorAnonimo = -1;

    public static function anonimo()
    {
        return Autor::$anonimo;
    }

    public static function valorAnonimo()
    {
        return Autor::$valorAnonimo;
    }

    /**
     * Devuelve los libros del autor ... si los hay.
     *
     * @return \App\Modelos\Libro
     */
    public function libros()
    {
        return $this->belongsToMany('App\Modelos\Libro', 'autor_libro', 'autor_id', 'libro_id');
    }

    /**
     * Accessors +- campos creados.
     */
    public function getNombreCompletoAttribute()
    {
        return $this->apellidos . ' ' . $this->nombre;
    }

    /**
     * Sólo con el apellido Attribute se pueden realmente añadir al modelo.
     */
    public function getNombreCompleto2Attribute()
    {
        return strtolower("$this->apellidos $this->nombre"); // Para ordenar.
    }

    public function getNombreApellidos()
    {
        return "$this->nombre $this->apellidos"; // Forma más elegante de encadenar campos.
    }

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['nombre_completo2', 'nombre_completo'];
}
