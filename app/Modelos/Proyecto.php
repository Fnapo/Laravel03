<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    // La asocia a la table proyectos ... minúsculas y plural de Proyecto. Es una especie de scaffolding de .NET
    // o se asocia manualmente con $table = 'nombre_tabla'.
    // protected $fillable = ['titulo', 'descripcion']; // Para llenar los campos al crear un proyecto.
    protected $guarded = []; // Obliga a una validación pues no protege de una Asignación Masiva.
}
