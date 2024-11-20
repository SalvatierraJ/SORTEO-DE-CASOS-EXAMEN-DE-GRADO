<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class mensajeConfirmacion extends Component
{
    public $titulo;
    public $contenido;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($titulo = 'Alerta', $contenido = 'Este es el contenido de la alerta.')
    {
        $this->titulo = $titulo;
        $this->contenido = $contenido;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.mensaje-confirmacion');
    }
}
