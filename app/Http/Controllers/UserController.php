<?php

namespace App\Http\Controllers;

use App\Http\Requests\DatosUserRequest;
use App\Modelos\Role;
use App\User;

class UserController extends Controller
{
    /*
    public function __construct() // No necesario por la función group
    {
    $this->middleware('auth');
    // Necesitamos otro middleware para evitar que ciertos usuarios @auth no puedan acceder a '/usuarios'.
    $this->middleware('roles'); // Con parámetros roles:hola.
    }
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $usuarios = User::orderBy('id')->paginate();

        return view('usuarios/userIndex', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $usuario = null;
        $rolesKeyId = Role::all()->sortBy('key')->pluck('key', 'id');

        return view('usuarios/userCreate', compact('usuario', 'rolesKeyId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\DatosUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DatosUserRequest $request)
    {
        //
        $datos = $request->validated();

        $datos['bcifrado'] = $datos['password'];
        User::create($datos);

        return redirect()->route('usuarios.index')->with('estado', 'Usuario dado de alta ...');
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
        $usuario = User::findOrFail($id);

        return view('usuarios/userShow', compact('usuario'));
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
        $usuario = User::findOrFail($id);
        $rolesKeyId = Role::all()->sortBy('key')->pluck('key', 'id');

        return view('usuarios/userEdit', compact('usuario', 'rolesKeyId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Request\DatosUserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DatosUserRequest $request, $id)
    {
        //
        $datos = $request->validated();
        $usuario = User::findOrFail($id);

        $datos['bcifrado'] = $datos['password'];
        $usuario->update($datos);

        return redirect()->route('usuarios.show', $id)->with('estado', 'Usuario modificado ...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $usuario = User::findOrFail($id);

        $usuario->delete();

        return redirect()->route('$usuarios.index')->with('estado', 'Usuario eliminado ...');
    }
}
