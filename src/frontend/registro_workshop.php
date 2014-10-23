<?php

/**
 * Retorna un array de usuario registrados en el evento
 *
 * @param string $token   El token de acceso a la api de Eventbrite
 * @param string $eventId El ID del evento
 * @param int    $page    El número de página para los resultados
 *
 * @return array
 */
function getAttendees($token, $eventId, $page = 1)
{
    $result = file_get_contents(
        sprintf('https://www.eventbriteapi.com/v3/events/%d/attendees/?', $eventId).http_build_query([
            'token'  => $token, // Eventbrite's API token
            'status' => 'attending',
            'page'   => $page
        ]),
        false,
        stream_context_create(array(
            'http' => array(
                'method' => "GET",
                'header' => implode("\r\n", [
                    'Content-Type: application/json',
                    'Accept: application/json',
                ]),
            )
        ))
    );

    return json_decode($result, true)['attendees'];
}

/**
 * Busca un usuario en la lista de `attendees` proporcionada por
 * Eventbrite. Si el usuario no es encontrado, retorna NULL.
 *
 * @param string $token   El token de acceso a la api de Eventbrite
 * @param string $eventId El ID del evento
 * @param string $email   El email del usuario
 *
 * @return mixed|null
 */
function findAttendee($token, $eventId, $email)
{
    $page = 1;
    do {
        $result   = getAttendees($token, $eventId, $page++);
        $profiles = array_filter($result, function ($attendee) use ($email) {
            return $email === $attendee['profile']['email'];
        });

        $found = count($profiles);
    } while (!$found && 50 === count($result));

    if ($found) {
        return current($profiles);
    }

    return null;
}

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
    $workshops = array_filter(isset($request['workshops']) ? $request['workshops'] : [], function ($workshop) {
        return !empty($workshop) && is_scalar($workshop);
    });

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

    # @TODO: Verificar que el email exista en eventbrite

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
