<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PostController extends Controller
{
    //el constructor es lo que se ejecuta cuando es instanciado este controlador
    public function __construct(){
        $this->middleware('auth'); //solo los usuarios autenticados pueden acceder al contenido
    }
    
    //
    public function index() {
        return view('dashboard');
    }
}
