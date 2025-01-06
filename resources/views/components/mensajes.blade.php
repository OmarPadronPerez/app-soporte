<?php
$estilo = '';

switch ($estado) {
    case 'realizado':
        $estilo = 'alert-success';
        break;
    case 'falla':
        $estilo = 'alert-danger';
        break;
}
?>


<div class="alert {{ $estilo }} alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <strong>{{$titulo}}</strong> {{ $mensaje }}
</div>

<script>
    var alertList = document.querySelectorAll(".alert");
    alertList.forEach(function(alert) {
        new bootstrap.Alert(alert);
    });
</script>
