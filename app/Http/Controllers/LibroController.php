<?php

namespace App\Http\Controllers;

use App\Http\Requests\DatosLibroRequest;
use App\Modelos\Autor;
use App\Modelos\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Protección de ciertas rutas.
        $this->middleware('biblio'); // Protección de ciertas rutas.
    }

    /**
     * Función para evitar datos erróneos en una relación Autor-Libro.
     *
     */
    protected function controlarAutores(array $autores, Libro $libro)
    {
        // Primer contol si se ha elegido Anónimo.
        if (in_array(Autor::valorAnonimo(), $autores)) {
            $autores = [];
        }
        // Segundo control si es un Autor que no está en la BD.
        Autor::findOrFail($autores);
        // Camino normal.
        $libro->autores()->attach($autores);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $libros = Libro::orderBy('id')->paginate();

        return view('libros/libroIndex', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $libro = null;
        $noAutores = Autor::all()->sortBy('nombre_completo2')->pluck('nombre_completo', 'id');

        return view('libros/libroCreate', compact('libro', 'noAutores'));
    }
/**
 * Store a newly created resource in storage.
 *
 * @param  \App\Http\Requests\DatosLibroRequest $request
 * @return \Illuminate\Http\Response
 */
    public function store(DatosLibroRequest $request)
    {
        //
        $datos = $request->validated();
        $datos['disponibles'] = $datos['obtenidos'];
        $autores = array_shift($datos);
        $libro = Libro::create($datos);
        $this->controlarAutores($autores, $libro);

        return redirect()->route('libros.index')->with('estado', 'Libro adquirido ...');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modelos\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        //
        $libro = Libro::with('autores')->findOrFail($libro->id);

        return view('libros/libroShow', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modelos\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro)
    {
        //
        $libro = Libro::findOrFail($libro->id);
        $autoresLibro = $libro->autores->modelKeys();
        $noAutores = Autor::all()->sortBy('nombre_completo2')->except($autoresLibro)->pluck('nombre_completo', 'id');

        return view('libros/libroEdit', compact('libro', 'noAutores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\DatosLibroRequest  $request
     * @param  \App\Modelos\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(DatosLibroRequest $request, Libro $libro)
    {
        //
        $datos = $request->validated();
        $autores = array_shift($datos);
        $libro = Libro::findOrFail($libro->id);

        $libro->update($datos);
        $this->controlarAutores($autores, $libro);

        return redirect()->route('libros.show', compact('libro'))->with('estado', 'Libro modificado ...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modelos\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        //
        $libro = Libro::findOrFail($libro->id);

        $libro->delete();

        return redirect()->route('libros.index')->with('estado', 'Libro eliminado ...');
    }
}
