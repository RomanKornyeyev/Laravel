@extends("layouts.app")

@section('titulo')
    Listado de users
@endsection

@section('contenido')

        @foreach($users as $user)
            <ul class="w-11/12 bg-white p-5 mb-5 mx-auto">
                <h2 class="text-2xl font-black">{{ $user->name }}</h2>
                <li>ID: {{ $user->id }}</li>
                <li>NAME: {{ $user->name }}</li>
                <li>NICK: {{ $user->username }}</li>
                <li>EMAIL: {{ $user->email }}</li>
                <li>PASS: {{ $user->password }}</li>
            </ul>
        @endforeach

@endsection