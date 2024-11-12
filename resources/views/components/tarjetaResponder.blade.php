<div class="card ">
    <div class="card-header">
        <h4>{{ $usuario }}</h4>

        <h5>{{ $falla }}</h5>
        <div class="mb-3">
            <label for="" class="form-label">
                <h5>Prioridad</h5>
            </label>
            <select class="form-select form-select-lg" name="" id="">
                <option value="Normal" selected>Normal</option>
                <option value="Baja">Baja</option>
                <option value="Alta">Alta</option>
                <option value="Critica">Critica</option>
            </select>
        </div>

    </div>
    <div class="card-body">
        <div class="descripcion">
            <h4 class="card-title">Descripcion del problema</h4>
            <p class="card-text">
                {{ $descripcion }}
            </p>
        </div>

    </div>
    <div class="col-12 col-md-5 imagen">
        <img src="image source" class="img-fluid rounded-top" alt="" />

    </div>
</div>
