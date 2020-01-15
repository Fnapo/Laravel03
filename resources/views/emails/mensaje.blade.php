<!DOCTYPE html>

<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Mensajes</title>
    </head>

    <body>
        <p>
            Mensaje recibido de {{$contenido['nombre']}} con email {{$contenido['email']}}.
        </p>
        <p>
            <strong>Asunto:</strong> {{$contenido['asunto']}}.
        </p>
        <p>
            <strong>Mensaje:</strong> {{$contenido['mensaje']}}.
        </p>
    </body>

</html>
