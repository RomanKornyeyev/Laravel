<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class LoginController extends Controller
{

    use ValidatesRequests;

    public function index()
    {
        return view('login');
    }

    public function store(Request $request){
        // dd($request->remember);

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //si ha introducido mal los credenciales, mostrar mensaje de error (guardado en sesión)
        //en el $request le pasamos si está marcado recuerdame o no
        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            // back retorna al user a la ubicación previa (de login a login en este caso)
            return back()->with('mensaje', 'credenciales incorrectas');
        }else{
            return redirect()->route('posts.index');
        }
    }
}
