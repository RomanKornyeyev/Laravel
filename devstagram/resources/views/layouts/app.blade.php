<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield("titulo")</title>
        @vite('resources/css/app.css')
    </head>
    <body class="bg-gray-100">
        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-black">
                    <a href="{{ route('inicio') }}">
                        DevStagram
                    </a>
                </h1>

                <nav>
                    @guest
                        <a class="font-bold uppercase text-gray-600" href="{{ route('login') }}">Login</a>
                        <a class="font-bold uppercase text-gray-600" href="{{ route('register') }}">Registro</a>
                    @endguest

                    @auth
                        <a class="font-bold text-gray-600" href="{{ route('posts.index') }}">
                            Hola: <span class="font-normal">  {{ auth()->user()->name }} </span>
                        </a>

                        {{-- Para evitar ataques XSS, hacemos un form en método POST con @csrf (para no hacer logout por GET) --}}
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="font-bold uppercase text-gray-600">
                                Logout
                            </button>
                        </form>
                        
                    @endauth
                    &nbsp;|&nbsp;
                    <a class="font-bold uppercase text-gray-600" href="{{ route('usuarios') }}">USERS</a>
                </nav>
            </div>
        </header>

        <main class="containter mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">
                @yield("titulo")
            </h2>
            @yield("contenido")
        </main>

        <footer class="text-center p-5 text-gray-100 font-bold uppercase bg-gray-500">
            DevStagram - Todos los derechos reservados
            {{ now()->year }}
        </footer>
    </body>
</html>
