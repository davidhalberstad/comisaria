<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>{{ $denuncia->apellido }}</title>
    <style>
        h1 {
            text-align: center;
            text-transform: uppercase;
        }

        .contenido {
            font-size: 20px;
        }

        #primero {
            background-color: #ccc;
        }

        #segundo {
            color: #44a359;
        }

        #tercero {
            text-decoration: line-through;
        }
    </style>
</head>

<body>
    <h1>Titulo de prueba</h1>
    <p>{{ $today }}</p>
    <hr>
    <div class="contenido">
        <p id="primero">{{ $denuncia->apellido }} {{ $denuncia->nombre }}</p>
        <p id="segundo">{{ $denuncia->tipo_dni }} {{ $denuncia->nro_documento }}</p>
        <p id="tercero">{{ $denuncia->edad }} {{ $denuncia->relato }}</p>
    </div>
</body>

</html>
