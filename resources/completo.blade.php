@extends('layout.app')

@section('content')
    <x-regla />

    <div class="container">
        <div class="row justify-content-center align-items-center g-2">
            <!--<div class="col-12">
                <h1>Tus tickets activos</h1>
            </div>-->

            <div class="col-12">
                <x-tarjetaCompleto/>
            </div>
        </div>

    </div>


    
@endsection
