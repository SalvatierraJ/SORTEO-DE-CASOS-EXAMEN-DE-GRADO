<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnviarCasoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nombreEstudiante;
    public $mensaje;
    protected $rutaArchivo;

    /**
     * Create a new message instance.
     */
    public function __construct($nombreEstudiante, $mensaje, $rutaArchivo)
    {
        $this->nombreEstudiante = $nombreEstudiante;
        $this->mensaje = $mensaje;
        $this->rutaArchivo = $rutaArchivo;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->view('emails.enviar_caso') // Vista del correo
            ->subject('Caso Asignado para Defensa')
            ->with([
                'nombreEstudiante' => $this->nombreEstudiante,
                'mensaje' => $this->mensaje,
            ])
            ->attach($this->rutaArchivo); // Adjuntar el archivo
    }
}
