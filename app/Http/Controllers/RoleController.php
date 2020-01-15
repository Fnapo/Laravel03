<?php

namespace App\Http\Controllers;

use App\Http\Requests\DatosRoleRequest;
use App\Modelos\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::orderBy('key')->paginate();

        return view('roles/roleIndex', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('roles/roleCreate', ['role' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\DatosRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DatosRoleRequest $request)
    {
        //
        $datos = $request->validated();

        Role::create($datos);

        return redirect()->route('roles.index')->with('estado', 'Role creado ...');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modelos\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
        $role = Role::findOrFail($role->id);

        return view('roles/roleShow', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modelos\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
        $role = Role::findOrFail($role->id);

        return view('roles/roleEdit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\DatosRoleRequest  $request
     * @param  \App\Modelos\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(DatosRoleRequest $request, Role $role)
    {
        //
        $datos = $request->validated();
        $role = Role::findOrFail($role->id);

        $role->update($datos);

        return redirect()->route('roles.show', $role)->with('estado', 'Role modificado ...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modelos\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
        $role = Role::findOrFail($role->id);

        $role->delete();

        return redirect()->route('$roles.index')->with('estado', 'Role eliminado ...');
    }
}
