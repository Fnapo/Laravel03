<?php

namespace App\Http\Controllers;

use App\Mail\MensajeRecibido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
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
    public function store(Request $request)
    {
        //
        // $nombre = request('nombre'); con la función request().
        // $nombre = $request->get('nombre');
        $contenido = $request->validate([
            'nombre' => 'required',
            'email' => 'email|required',
            'asunto' => ['required'],
            'mensaje' => ['required', 'min:3'],
            // min (o max) con strings indica la longitud mínima.
            // size indica una longitud fija.
        ]);
        Mail::to('napoleoniii@hotmail.com')->queue(new MensajeRecibido($contenido)); // Envío a storage/logs ...
        // o a otro driver de email.
        // return (new MensajeRecibido($contenido)); // Para verlo en el navegador. Pero hay problemas con el uso
        // de la actualización del navegador, pregunta si quieres reenviar el formulario. Uso back o redirect con with.
        // Importante casi seguro se debe hacer php artisan config:cache para actualizar los valores del .env en caché.
        // Además de usar la contraseña generada, como segundo factor, para el dispositivo en lugar de la tuya propia.

        return redirect()->route('home')->with('estado', 'Mensaje enviado ...');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
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
    public function destroy($id)
    {
        //
    }
}
