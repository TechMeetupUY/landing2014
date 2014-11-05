<?php

$data = call_user_func(function () {

    $config   = require __DIR__.'/../../config.php';
    $dbConfig = $config['db'];

    # Conexión PDO
    $pdo = new PDO(strtr('mysql:dbname=__dbname;host=__host', array(
        '__dbname' => $dbConfig['database'],
        '__host'   => $dbConfig['host'],
    )), $dbConfig['user'], $dbConfig['password']);

    $data = array('asistentes' => array(), 'cantidades' => array(), 'prioridades' => array());

    $stmt = $pdo->prepare('SELECT nombre, email, GROUP_CONCAT(workshop order by prioridad) as workshops from workshops GROUP BY email ORDER BY id');
    $stmt->execute();

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        $row['workshops']     = explode(',', $row['workshops']);
        $data['asistentes'][] = $row;
    }

    $stmt = $pdo->prepare('SELECT workshop, COUNT(1) AS inscriptos FROM workshops GROUP BY workshop ORDER BY inscriptos DESC');
    $stmt->execute();

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        $data['cantidades'][] = $row;
    }

    $stmt = $pdo->prepare('SELECT workshop, IF(0 = prioridad, "alta", IF(1 = prioridad, "media", "baja")) AS nombre_prioridad, COUNT(1) AS inscriptos FROM workshops GROUP BY prioridad, workshop ORDER BY prioridad, inscriptos DESC');

    $stmt->execute();

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        $data['prioridades'][$row['nombre_prioridad']][] = $row;
    }

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
                    <h2>Asistentes</h2>

                    <table class="lista-interna">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th colspan="3">Workshops</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <td colspan="5">Total: <?=count($data['asistentes'])?></td>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($data['asistentes'] as $asistente): ?>
                                <tr>
                                    <td><?= $asistente['nombre'] ?></td>
                                    <td><?= $asistente['email'] ?></td>
                                    <?php foreach ($asistente['workshops'] as $workshop): ?>
                                        <td class="workshop"><?= $workshop ?></td>
                                    <?php endforeach; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </section>
            </div>

            <div class="container container-with-margins" style="top: 100px; padding-bottom: 100px;">
                <section class="sixteen columns clearfix workshops">
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
            </div>

            <div class="container container-with-margins" style="top: 100px; padding-bottom: 100px;">
                <section class="sixteen columns clearfix workshops">
                    <h2>Cantidad inscriptos por workshop agrupados por prioridad</h2>

                    <?php foreach ($data['prioridades'] as $prioridad => $workshops): ?>
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
                        <?php endforeach; ?>
                    </table>

                </section>
            </div>
        </div>

        <script src="assets/javascripts/jquery.min.js"></script>
        <script src="assets/javascripts/angular.min.js"></script>
        <script src="assets/javascripts/modernizr.js"></script>
        <script src="assets/javascripts/plugins.js"></script>
        <script src="assets/javascripts/script.js"></script>
    </body>
</html>
