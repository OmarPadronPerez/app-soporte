@extends('layout.app')

@section('content')
    <x-regla />

    <div class="container">
        <div class="row justify-content-center align-items-center g-2">
            <div class="col-12">
                <h1>en responder tickets</h1>
            </div>

            <div class="col-12">
                <x-tarjetaResponder />
            </div>
            <div class="col-12">

                <div class="mb-3">

                    <label for="" class="form-label">
                        <h3>Diagnostico tecnico</h3>
                    </label>
                    <textarea class="form-control" name="" id="" rows="3"></textarea>
                </div>

            </div>
            <div class="row justify-content-between align-items-start g-2">
                <h3>Estado</h3>
                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                    <input type="radio" class="btn-check " name="btnradio" id="btncheck1" autocomplete="off" />
                    <label class="btn btn-outline-primary" for="btncheck1">En revision</label>

                    <input type="radio" class="btn-check" name="btnradio" id="btncheck2" autocomplete="off" />
                    <label class="btn btn-outline-primary" for="btncheck2">Pospuesto</label>

                    <input type="radio" class="btn-check" name="btnradio" id="btncheck3" autocomplete="off" />
                    <label class="btn btn-outline-primary" for="btncheck3">Concluido</label>
                </div>
            </div>
            <div class="espacio" style="height: 20px"></div>
            <button type="button" class="btn btn-primary">
                Guardar
            </button>
            <div class="espacio" style="height: 20px"></div>



        </div>

    </div>
@endsection
