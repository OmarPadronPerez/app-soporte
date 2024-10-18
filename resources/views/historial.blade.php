@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center g-2">
            <div class="col-12">
                <h2>Historial</h2>
            </div>

            <div class="col-12">
                @for ($x = 0; $x < 3; $x++)
                    <x-tarjeta />
                    <div class="espacio" style="height: 15px"></div>
                @endfor
            </div>
        </div>
    </div>
@endsection
