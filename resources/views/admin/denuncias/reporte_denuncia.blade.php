<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>{{ $denuncia->apellido }}</title>
    <style>
    /* Patametros del contenido completo del texto */
        .contenido  {
             font-size: 20px; /* tamanio del texto */
            line-height: 100%; /* interlineado */
            font-family: Arial;
        }
    /* Patametros del contenido del la primera linea */
        #titulo {
            text-align: left; /* Alineacion del texto */
            text-transform: uppercase;
            text-decoration: underline; /* Subrayo el texto */
            font-weight: bold; /* Negrita el texto */
        }

        #cuerpo {
             text-align: justify; /* Alineacion del texto */
        }

        #firma_jefe {
             text-align: right;; /* Alineacion del texto */
             text-decoration: overline;  /* Subrayo el texto */
             position:absolute;
	           right:80px;
            page-break-after:avoid;
        }

        #firma_secretario {
          text-align: left; /* Alineacion del texto */
          text-decoration: overline;  /* Subrayo el texto */
          position:absolute;
          left:80px;
          page-break-after:avoid;
        }

        #firma_denunciante {
          text-align: left; /* Alineacion del texto */
          text-decoration: overline;  /* Subrayo el texto */
          position:absolute;
          left:40px;
          page-break-after:avoid;
        }


    </style>
</head>

<body>
  <div class="contenido">

      <p id="titulo">{{ $denuncia->apellido }} {{ $denuncia->nombre }} S/Denuncia.-</p>

      <p id="cuerpo">En la Comisaría Seccional Décimo Cuarta UR-X de Policía de la ciudad de Garupa de la Provincia de Misiones,  {{ $date }}, siendo las {{ $denuncia->hora_denuncia }} horas; comparece ante Mí Funcionario de Policía que suscribe, titular de esta Dependencia y Secretario que al efecto designo, quien presente acepta el cargo conferido bajo formalidades legales; una persona que manifiesta deseos de radicar una denuncia, a la cual se le hace saber de la penalidades con que la Ley sanciona a los que se produjeren con falsedad en sus denuncias, según lo establece el artículo 245° del C.P.A. y en concordancia con el artículo 122° del C.P.P.M. LEY XIV - NRO. 13, prestó juramento de ley mediante la siguiente formula “JURA CON PLENO CONOCIMIENTO DE RESPONSABILIDAD ANTE SU CONCIENCIA Y ANTE EL PUEBLO DE LA PROVINCIA DE MISIONES QUE DIRÁ VERDAD DE TODO CUANTO SUPIERE Y LE FUERE PREGUNTADO Y QUE NADA OCULTARA”, respondiendo “SI JURO”; Seguidamente es requerido por sus nombres, apellidos y demás datos de identidad persona DIJO LLAMARSE:

      {{ $denuncia->apellido }} {{ $denuncia->nombre }}, Documento:  {{ $denuncia->tipo_dni }} {{ $denuncia->nro_documento }}, ({{ $denuncia->edad }}), {{ $denuncia->domicilio }}, {{ $denuncia->sexo }}, {{ $denuncia->telefono_fijo }}, {{ $denuncia->telefono_celular }}, {{ $denuncia->correo_electronico }}.

      Seguidamente y cedida que le fue la palabra DENUNCIA: {{ $denuncia->relato }}.

      Con lo que no siendo para más se da por finalizado el presente acto, previa e íntegra lectura que de por sí efectuó, se ratifico de su total contenido y para constancia firma al pie por ante la Instrucción que CERTIFICA.-

      </p>

<br />

      <p id="firma_denunciante">FIRMA DEL DENUNCIANTE</p>

<br />
<br />

      <p id="firma_jefe">JEFE DE DEPENDENCIA</p>

<br />
<br />

      <p id="firma_secretario">SECRETARIO</p>
  </div>
</body>

</html>
