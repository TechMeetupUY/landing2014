<?php

//$result = file_get_contents(
//    'https://www.eventbriteapi.com/v3/events/123456789/attendees/?'.http_build_query(['token' => '3BS25F7EIU2IIB4YWQWF']),
//    false,
//    stream_context_create(array(
//        'http' => array(
//            'method' => "GET",
//            'header' => implode("\r\n", [
//                'Content-Type: application/json',
//                'Accept: application/json',
//                'Authorization: Bearer 3BS25F7EIU2IIB4YWQWF'
//            ]),
//        )
//    ))
//);
//
//echo $result, PHP_EOL;

function stopWithBadRequest(array $errors = [])
{
    header('HTTP/1.0 400 Bad Request', null, 400);

    if (!empty($errors)) {
        echo json_encode(['errors' => $errors]);
    }

    exit(1);
}

if (!isset($_POST) || empty($_POST)) {
    header('HTTP/1.0 404 Not Found', null, 404);

    exit(1);
}

call_user_func(function (array $request) {
    header('Content-Type: application/json');

    $nombre    = isset($request['nombre']) ? $request['nombre'] : '';
    $email     = isset($request['email']) ? $request['email'] : '';
    $workshops = isset($request['workshops']) ? $request['workshops'] : [];

    $errors = [];

    if (empty($nombre) || !is_string($nombre)) {
        array_push($errors, 'El nombre es inválido.');
    }

    if (!preg_match('/.+\@.+\..+/', $email)) {
        array_push($errors, 'El email es inválido.');
    }

    if (!is_array($workshops) || empty($workshops)) {
        # Este error indica que no hay workshops para agregar
        # y el chequeo debe terminar acá
        array_push($errors, 'Los workshops son inválidos.');

        stopWithBadRequest($errors);
    }

    $workshopsData = include __DIR__.'/workshops.php';

    # Obtengo los keys de los workshops para poder comparar
    # con los datos del $_POST
    $workshopKeys = array_map(function ($workshop) {
        return $workshop['key'];
    }, $workshopsData);

    if (count(array_diff($workshops, $workshopKeys))) {
        # El formulario envió workshops que no existen en la configuración
        array_push($errors, 'Los workshops son inválidos.');
    }

    if (count($errors)) {
        stopWithBadRequest($errors);
    }

    # Pronto para guardar el registro en la base de datos

    try {
        # verificar datos de conexión
        $pdo = new PDO('mysql:dbname=techmeetup;host=127.0.0.1', 'tech', 'meetup');

        # TODO: Debemos revisar que no se inscriba más de una vez?

        $insertStmt = $pdo->prepare('INSERT INTO workshops (nombre, email, workshops) VALUES (:nombre, :email, :workshops)');

        $insertStmt->bindValue(':nombre', $nombre);
        $insertStmt->bindValue(':email', $email);
        $insertStmt->bindValue(':workshops', implode(', ', $workshops));

        $insertStmt->execute();
    } catch (PDOException $e) {
        stopWithBadRequest([
            'Hubo un error con el procesamiento de los datos. Por favor, intentalo más tarde.',
            $e->getMessage()
        ]);
    }

    echo json_encode(['success' => true]);
}, $_POST);
