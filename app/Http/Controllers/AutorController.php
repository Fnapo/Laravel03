<?php

namespace App\Http\Controllers;

use App\Http\Requests\DatosAutorRequest;
use App\Modelos\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $autores = Autor::orderBy('id')->paginate();

        return view('autores/autorIndex', compact('autores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('autores/autorCreate', ['autor' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\DatosAutorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DatosAutorRequest $request)
    {
        //
        $datos = $request->validated();

        Autor::create($datos);

        return redirect()->route('autores.index')->with('estado', 'Autor dado de alta ...');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modelos\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function show(Autor $autor)
    {
        //
        $autor = Autor::findOrFail($autor->id);

        return view('autores/autorShow', compact('autor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modelos\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function edit(Autor $autor)
    {
        //
        $autor = Autor::findOrFail($autor->id);

        return view('autores/autorEdit', compact('autor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\DatosAutorRequest  $request
     * @param  \App\Modelos\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function update(DatosAutorRequest $request, Autor $autor)
    {
        //
        $datos = $request->validated();
        $autor = Autor::findOrFail($autor->id);

        $autor->update($datos);

        return redirect()->route('autores.show', compact('autor'))->with('estado', 'Autor modificado ...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modelos\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Autor $autor)
    {
        //
        $autor = Autor::findOrFail($autor->id);

        $autor->delete();

        return redirect()->route('autores.index')->with('estado', 'Autor eliminado ...');
    }
}
