<?php

namespace App\Http\Controllers;

use App\Modelos\AutorLibro;
use DB;
use Illuminate\Http\Request;

class AutorLibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($autor, $libro)
    {
        //
        $objeto = AutorLibro::firstOrCreate(['autor_id' => $autor, 'libro_id' => $libro]);

        if (is_null($objeto)) {
            return redirect()->back()->with('estado', 'Error en la BD ...');
        }

        return redirect()->back()->with('estado', 'Autor asignado ...');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $autor, int $libro)
    {
        //
        $objeto = AutorLibro::where('autor_id', $autor)
            ->where('libro_id', $libro)
            ->first();

        if (is_null($objeto)) {
            return redirect()->back()->with('estado', 'Este Autor no ha escrito este Libro ...');
        }
        DB::table('autor_libro')->where('autor_id', $autor)->where('libro_id', $libro)->delete();
        /*
        La mejor opción con Eloquent.
        $objeto->delete();
         */

        return redirect()->back()->with('estado', 'Detectado falso Autor ...');
    }
}
