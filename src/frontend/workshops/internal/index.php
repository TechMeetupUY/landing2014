<?php

function buscarColisiones(PDO $pdo)
{
    $agenda = array(
        '09:00' =>
            array(
                0 => 'openstack',
                1 => 'dev_toolbox',
            ),
        '11:00' =>
            array(
                0 => 'scala',
                1 => 'golang',
            ),
        '14:00' =>
            array(
                0 => 'ios',
                1 => 'mysql',
                2 => 'mobile_testing',
            ),
        '16:00' =>
            array(
                0 => 'agile',
                1 => 'arduino',
                2 => 'nodejs',
            ),
    );

    $registros  = array();
    $ids        = array();
    $colisiones = array();
    $stmt       = $pdo->prepare('SELECT id, email, workshop, prioridad FROM workshops_colisiones ORDER BY id ASC');

    $stmt->execute();

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
        $registros[$row['email']][$row['workshop']] = $row['prioridad'];

        $ids[$row['email']] = $row['id'];
    }

    unset($stmt);

    foreach ($registros as $email => $workshops1) {
        foreach ($agenda as $hora => $workshops2) {
            $intersection = array_intersect(array_keys($workshops1), $workshops2);
            if (2 > count($intersection)) {
                continue;
            }

            foreach ($intersection as $w) {
                $colisiones[$w][$email] = $ids[$email];
            }
        }
    }

    return $colisiones;
}

$data = call_user_func(function () {
    # Conexión PDO
    $pdo = require __DIR__.'/../connection.php';

    $data = array(
        'asistentes'  => array(),
        'cantidades'  => array(),
        'prioridades' => array(),
        'conferencia' => array(),
        'registrados' => array(),
        'aprobados'   => array(),
    );

    $colisiones = buscarColisiones($pdo);

    $stmt = $pdo->prepare('SELECT nombre, email, GROUP_CONCAT(workshop order by prioridad) as workshops, asiste_conferencia from workshops_colisiones WHERE prioridad < 3 AND aprobado = 1 GROUP BY email ORDER BY id');
    $stmt->execute();

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        $row['workshops']               = explode(',', $row['workshops']);
        $data['asistentes_aprobados'][] = $row;
    }

    $stmt = $pdo->prepare('SELECT nombre, email, workshop, asiste_conferencia, aprobado from workshops_colisiones ORDER BY email, prioridad');
    $stmt->execute();

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        if (!isset($data['registrados'][$row['email']])) {
            $data['registrados'][$row['email']] = array(
                'nombre'             => $row['nombre'],
                'asiste_conferencia' => $row['asiste_conferencia']
            );
        }

        $row['colision'] = isset($colisiones[$row['workshop']][$row['email']]) && $colisiones[$row['workshop']][$row['email']];

        $data['registrados'][$row['email']]['workshops'][] = $row;
    }

    $stmt = $pdo->prepare('SELECT nombre, email, GROUP_CONCAT(workshop order by prioridad) as workshops, asiste_conferencia from workshops_colisiones WHERE prioridad < 3 GROUP BY email ORDER BY id');
    $stmt->execute();

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        $row['workshops']     = explode(',', $row['workshops']);
        $data['asistentes'][] = $row;
    }

    $stmt = $pdo->prepare('SELECT workshop, COUNT(1) AS inscriptos FROM workshops_colisiones WHERE prioridad < 3 GROUP BY workshop ORDER BY inscriptos DESC');
    $stmt->execute();

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        $data['cantidades'][] = $row;
    }

    $stmt = $pdo->prepare('SELECT workshop, IF(0 = prioridad, "alta", IF(1 = prioridad, "media", "baja")) AS nombre_prioridad, COUNT(1) AS inscriptos FROM workshops_colisiones WHERE prioridad < 3 GROUP BY prioridad, workshop ORDER BY prioridad, inscriptos DESC');

    $stmt->execute();

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        $data['prioridades'][$row['nombre_prioridad']][] = $row;
    }

    $stmt = $pdo->prepare('SELECT asiste_conferencia, COUNT(DISTINCT email) AS cantidad FROM workshops_colisiones WHERE prioridad < 3 GROUP BY asiste_conferencia ORDER BY cantidad DESC');

    $stmt->execute();

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        $data['conferencia'][] = $row;
    }

    $stmt = $pdo->prepare('SELECT workshop, COUNT(DISTINCT email) AS cantidad FROM workshops_colisiones WHERE aprobado = 1 GROUP BY workshop ORDER BY cantidad DESC');

    $stmt->execute();

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        $data['aprobados_cantidad'][] = $row;
    }

    $stmt = $pdo->prepare('SELECT nombre, email, workshop FROM workshops_colisiones WHERE aprobado = 1 ORDER BY workshop, nombre, email');

    $stmt->execute();

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        $data['aprobados'][$row['workshop']][] = array('nombre' => $row['nombre'], 'email' => $row['email']);
    }

    uasort($data['aprobados'], function ($a, $b) {
        return count($a) - count($b);
    });

    return $data;
});

?>
<!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>TechMeetup 2014</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <base href="../../">
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600' rel='stylesheet' type='text/css'/>

        <link rel="stylesheet" href="assets/css/screen.css">
    </head>
    <body>
        <header>

            <div class="container">
                <div class="header-menu sixteen columns clearfix">
                    <a href="index.php" class="three columns alpha logo-container">
                        <img src="../../assets/images/2014/landing/logo.png" alt="">
                    </a>
                    <ul class="thirteen columns omega">
                        <li><a class="scrollable" href="/#sponsors">Sponsors</a></li>
                        <li><a class="scrollable" href="/#speakers">Oradores</a></li>
                        <li><a class="scrollable" href="/#workshops">Workshops</a></li>
                        <li><a class="scrollable" href="/#organizadores">Organiza</a></li>

                        <li><a class="color-green" href="v2013">v2013</a></li>
                        <li><a class="color-green" href="v2012">v2012</a></li>

                    </ul>
                </div>
            </div>
        </header>

        <div class="white-wrapper">
            <div class="container container-with-margins" style="top: 100px; padding-bottom: 100px;">
                <section class="sixteen columns clearfix workshops">
                    <h2>Asistentes aprobados</h2>

                    <table class="lista-interna">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Conferencia</th>
                                <th colspan="3">Workshops</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <td colspan="6">Total: <?= count($data['registrados']) ?></td>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($data['registrados'] as $email => $asistente): ?>
                                <tr>
                                    <td><?= $asistente['nombre'] ?></td>
                                    <td><?= $email ?></td>
                                    <td class="center"><?= $asistente['asiste_conferencia'] ?></td>
                                    <?php foreach ($asistente['workshops'] as $workshop): ?>
                                        <td class="workshop <?= $workshop['colision'] ? 'colision' : '' ?> <?= $workshop['aprobado'] ? 'aprobado' : '' ?>">
                                            <?= $workshop['workshop'] ?>
                                        </td>
                                    <?php endforeach; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </section>
            </div>

            <div class="container container-with-margins" style="top: 100px; padding-bottom: 100px;">
                <section class="eight columns clearfix workshops">
                    <h2>Cantidad aprobados por workshop</h2>

                    <table class="lista-interna">
                        <thead>
                            <tr>
                                <th>Workshop</th>
                                <th>Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['aprobados_cantidad'] as $cantidad): ?>
                                <tr>
                                    <td><?= $cantidad['workshop'] ?></td>
                                    <td class="center"><?= $cantidad['cantidad'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </section>

                <section class="eight columns clearfix workshops">
                    <h2>Cantidad inscriptos por workshop</h2>

                    <table class="lista-interna">
                        <thead>
                            <tr>
                                <th>Workshop</th>
                                <th>Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['cantidades'] as $cantidad): ?>
                                <tr>
                                    <td><?= $cantidad['workshop'] ?></td>
                                    <td class="center"><?= $cantidad['inscriptos'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </section>

                <section class="eight columns clearfix workshops">
                    <h2>Cantidad asistencias a la conferencia</h2>

                    <table class="lista-interna">
                        <thead>
                            <tr>
                                <th>Va a la conferencia</th>
                                <th>Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['conferencia'] as $conf): ?>
                                <tr>
                                    <td><?= $conf['asiste_conferencia'] ?></td>
                                    <td class="center"><?= $conf['cantidad'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </section>

            </div>

            <div class="container container-with-margins" style="top: 100px; padding-bottom: 100px; overflow: auto;">
                <h2 style="text-align: center;">Aprobados a workshops</h2>

                <?php foreach ($data['aprobados'] as $workshop => $aprobados): ?>
                    <section class="eight columns workshops">
                        <h3><?= $workshop ?></h3>
                        <table class="lista-interna">
                            <thead>
                                <!--<tr>
                                    <th colspan="2">Prioridad <? /*= $prioridad */ ?></th>
                                </tr>-->
                                <tr>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($aprobados as $aprobado): ?>
                                    <tr>
                                        <td><?= $aprobado['nombre'] ?></td>
                                        <td><?= $aprobado['email'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </section>
                <?php endforeach; ?>
            </div>

            <div class="container container-with-margins" style="top: 100px; padding-bottom: 100px;">
                <h2 style="text-align: center;">Cantidad inscriptos por workshop agrupados por prioridad</h2>

                <?php foreach ($data['prioridades'] as $prioridad => $workshops): ?>
                    <section class="eight columns workshops">
                        <table class="lista-interna">
                            <thead>
                                <tr>
                                    <th colspan="2">Prioridad <?= $prioridad ?></th>
                                </tr>
                                <tr>
                                    <th>Workshop</th>
                                    <th>Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($workshops as $workshop): ?>
                                    <tr>
                                        <td><?= $workshop['workshop'] ?></td>
                                        <td class="center"><?= $workshop['inscriptos'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </section>
                <?php endforeach; ?>

            </div>
        </div>

        <script src="assets/javascripts/jquery.min.js"></script>
        <script src="assets/javascripts/angular.min.js"></script>
        <script src="assets/javascripts/modernizr.js"></script>
        <script src="assets/javascripts/plugins.js"></script>
        <script src="assets/javascripts/script.js"></script>
    </body>
</html>
