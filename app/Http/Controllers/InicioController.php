<?php

namespace App\Http\Controllers;

class InicioController extends Controller
{
    /**
     * Muestra la página de bienvenida.
     */
    public function index()
    {
        return view('tienda.inicio');
    }
}
