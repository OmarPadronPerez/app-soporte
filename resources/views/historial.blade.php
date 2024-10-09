@extends('layout.app')

@section('content')

    <h2>Historial</h2>
    @for($x=0; $x<3; $x++){
        <x-tarjeta />
    }
    

@endsection
