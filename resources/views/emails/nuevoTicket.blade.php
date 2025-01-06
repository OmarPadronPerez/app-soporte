@php
    $imageUrl = public_path("/imagenes/logoABG.png");
    $message->embed($imageUrl, 'Grupo ABG');
@endphp
<div>
    <img src={{$message->embed($imageUrl)}} style="width:auto;" alt="Grupo ABG" srcset="">
</div>
<h2>Se realizo un ticket de mantenimiento nuevo</h2>

ID de ticket: <b>{{ $datos->id }}</b>
<br>
Usuario: <b>{{$datos->lastName." ".$datos->name}}</b>
<br>
Fecha: <b>{{ $datos->created_at }}</b>
<br>
Falla: <b>{{$datos->Falla}}</b>
<br>
Descripcion de falla
<br>
<b>{{$datos->Detalles}}</b>

<h3>Nos comunicaremos con usted lo mas rapido posible</h3>
<h4>Area de Sistemas de Grupo ABG</h4>

