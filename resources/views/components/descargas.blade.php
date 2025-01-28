<style>
    .vista img {
        border: 1px solid #000000;
        padding: 2px;
        width: 100%
    }

    .botonD {
        margin-bottom: 5px;
        margin-left: 5px;
    }

    iframe {
        height: 400px;
        width: 100%;
    }
</style>
@php
    $previa = 'display: none';
    $estilo = 'btn-warning';
    $ruta = '/' . $id . '/' . $file;
    $extencion = Str::afterLast($file, '.');
    $tipo = '';
    switch ($extencion) {
        case 'pdf':
            $tipo = 'PDF';
            $estilo = 'btn-danger';
            $previa = '';
            break;

        case 'PNG':
        case 'png':
        case 'jpg':
        case 'jpeg':
            $tipo = 'Imagen';
            $estilo = 'btn-primary';
            $previa = '';
            break;

        case 'xml':
            $tipo = 'XML';
            $estilo = 'btn-secondary';
            break;

        case 'xlsx':
        case 'xls':
            $tipo = 'Excel';
            $estilo = 'btn-success';
            break;

        default:
            $tipo = $extencion;
            break;
    }
@endphp

<div class="col-12">
    <div class="mb-3 vista" style="{{ $previa }}">
        @if ($tipo == 'Imagen')
            <!--si es imagen-->
            <img src="{{ '/archivos' . $ruta }}" class="img-fluid rounded-top" alt="" />
        @endif
        @if ($tipo == 'PDF')
            <!--si es pfd-->
            <iframe src="{{ '/archivos' . $ruta }}" frameborder="0"></iframe>
        @endif
        <div class="mb-1">
            <a name="" id="" style="margin-top: 15px;" class="btn {{ $estilo }} botonD" href="{{ '/tickets' . $ruta }}"
                role="button">Descargar <b>{{ $tipo }}</b> </a>
        </div>

    </div>
</div>
