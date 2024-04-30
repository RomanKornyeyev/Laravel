<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Validation\ValidatesRequests;

/* 
Laravel usa una convención:
    GET = vista.index
    POST = vista.store (crear)
    PUT/PATCH = vista.update (actualizar)
    DELETE = vista.destroy (eliminar)
*/

class RegisterController extends Controller
{

    use ValidatesRequests;

    public function index() {
        return view('auth.register');
    }

    public function store(Request $request) {
        // dd = var_dump
        // dd($request->get('username'));

        //Modificarmos el registro
        /*
            slug convierte string en lower y URL, ejemplo: este-es-un-ejemplo
            
            Esto se hace porque al comparar en la base de patos con slug, si son minus con
            mayus o con espacios no detecta que son iguales, por tanto, no hace bien la comparación
            para solucionar esto modificamos el registro previamente y seguidamente comprobamos
        */
        $request->request->add(['username' => Str::slug($request->username)]);

        // ********** VALIDAR **********
        $this->validate($request, [
            'name' => ['required', 'max:50'],
            'username' => 'required|unique:users|min:3|max:30',
            'email' => 'required|unique:users|email|max:80',
            'password' => 'required|min:4|max:20|confirmed'
        ]);

        User::create([
            'name' => $request->get('name'),
            'username' => $request->get('username'),
            'email' =>  $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ]);

        // ********** AUTENTIFICAR **********
        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password
        // ]);

        //otra forma
        auth()->attempt($request->only('email', 'password'));

        // ********** REDIRECCIONAR **********
        // return redirect()->route('usuarios');
        return redirect()->route('posts.index');


    }
}
