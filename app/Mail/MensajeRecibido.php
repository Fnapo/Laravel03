<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MensajeRecibido extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Mensaje recibido.';
    public $contenido;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contenido)
    {
        //
        $this->contenido = $contenido;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->contenido['email'], $this->contenido['nombre'])->view('emails/mensaje');
        // Se debe añadir from para mensajes reales si el emisor no es siempre el mismo.
    }
}
