<?php

function getWorkshops()
{
    $quantities = array();

    try {
        $config = require(__DIR__.'/../config.php');

        $dbConfig = $config['db'];

        # Conexión PDO
        $pdo = new PDO(strtr('mysql:dbname=__dbname;host=__host', array(
            '__dbname' => $dbConfig['database'],
            '__host'   => $dbConfig['host'],
        )), $dbConfig['user'], $dbConfig['password']);

        $stmt = $pdo->prepare('SELECT workshop, COUNT(1) as quantity FROM workshops GROUP BY workshop');
        $stmt->execute();

        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $quantities[$row['workshop']] = $row['quantity'];
        }
    } catch (PDOException $e) {
    }

    $workshops = include(__DIR__.'/../workshops.php');

    return array_map(function ($workshop) use ($quantities) {
        $waitingList = isset($quantities[$workshop['key']]) && $quantities[$workshop['key']] >= $workshop['max'];

        return array(
            'key'    => $workshop['key'],
            'titulo' => $workshop['titulo'].($waitingList ? '  *** lista de espera ***' : '')
        );
    }, $workshops);
}

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
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600' rel='stylesheet' type='text/css'/>

        <link rel="stylesheet" href="../assets/css/screen.css">
    </head>
    <body>
        <header>

            <div class="container">
                <div class="header-menu sixteen columns clearfix">
                    <a href="index.php" class="three columns alpha logo-container">
                        <img src="../assets/images/2014/landing/logo.png" alt="">
                    </a>
                    <ul class="thirteen columns omega">
                        <li><a class="scrollable" href="/#sponsors">Sponsors</a></li>
                        <li><a class="scrollable" href="/#speakers">Oradores</a></li>
                        <li><a class="scrollable" href="/#workshops">Workshops</a></li>
                        <li><a class="scrollable" href="/#organizadores">Organiza</a></li>

                        <li><a class="color-green" href="../v2013">v2013</a></li>
                        <li><a class="color-green" href="../v2012">v2012</a></li>

                    </ul>
                </div>
            </div>
        </header>

        <div class="container container-with-margins" style="top: 100px; padding-bottom: 100px;" ng-app="meetupWorkshops">
            <section class="sixteen columns workshops clearfix" ng-controller="FormCtrl" ng-init="workshops = <?= htmlspecialchars(json_encode(getWorkshops())) ?>">

                <h2>Registrate en los workshops</h2>

                <p>
                  Ingresa tus datos y seleccionar al menos un workshop al que estés interesado asistir. ¡Los cupos son limitados!
                  <br>
                  Debes estar registrado en la conferencia para poder participar de los workshops.
                </p>

                <form name="wsForm" ng-submit="submit()" id="workshop-form">
                    <fieldset>
                        <div class="sixteen columns">
                            <div class="five columns" ng-class="{error: wsForm.nombre.$invalid && wsForm.$dirty}">
                                <label for="workshop-name">Nombre</label>
                                <input type="text" name="nombre" id="workshop-name" ng-model="model.nombre" required ng-minlength="4"/>
                            </div>

                            <div class="five columns" ng-class="{error: wsForm.email.$invalid && wsForm.$dirty}">
                                <label for="workshop-email">e-mail</label>
                                <input type="email" name="email" id="workshop-email" ng-model="model.email" placeholder="Dirección del registro." required/>
                            </div>
                        </div>
                    </fieldset>


                    <fieldset>
                        <div class="sixteen columns">
                            <?php
                            for ($i = 1; $i <= 3; $i++): ?>
                                <div class="five columns" ng-class="{error: wsForm.workshop<?= $i; ?>.$invalid && wsForm.$dirty}">
                                    <label style="text-align: left;" for="workshop-dropdown-<?= $i; ?>">Workshop</label>
                                    <select ng-options="w.key as w.titulo for w in workshops" ng-model="model.workshops[<?= $i; ?>]" name="workshop<?= $i; ?>" id="workshop-dropdown-<?= $i; ?>" <?= 1 === $i ? 'required="required"' : '' ?> id="workshop<?= $i ?>">
                                        <option value="">---</option>
                                    </select>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </fieldset>

                    <fieldset>
                        <div class="sixteen columns">
                            <div class="five columns" ng-class="{error: wsForm.asistencia.$invalid && wsForm.$dirty}" >
                                <label style="text-align: left;" for="workshop-asistencia">¿Vas a la conferencia?</label>
                                <select name="asistencia" id="workshop-asistencia" ng-model="model.asistencia" ng-options="key as name for (key, name) in {'si': 'Obvio', 'no': 'Me la pierdo'}" required>
                                    <option value=""> --- </option>
                                </select>
                            </div>
                        </div>
                    </fieldset>

                    <p class="message" ng-repeat="message in messages" ng-class="{error: message.error}" ng-bind="message.text"></p>

                    <button type="submit" ng-disabled="wsForm.$invalid">Registrarme</button>

                    <p><em>Puedes revisar la agenda a continuación.</em></p>
                </form>
            </section>
        </div>
        <!--        </workshops>-->

        <?php include(__DIR__.'/agenda.php'); ?>

        <div class="footer-wrapper">
            <footer>
                <div class="container">
                    <section class="sixteen columns footer clearfix">

                        <div class="seven columns alpha omega">
                            <h4>Información General</h4>
                            <p><a href="mailto:info@meetup.uy">info@meetup.uy</a></p>

                            <h4>Organización</h4>
                            <p><a href="mailto:organizacion@meetup.uy">organizacion@meetup.uy</a></p>

                            <h4>Comunicación</h4>
                            <p><a href="mailto:comunicacion@meetup.uy">comunicacion@meetup.uy</a></p>

                            <h4>Teléfono</h4>
                            <p><a href="phone:+59827078003">+598 2 707 8003</a></p>

                            <div class="social-icons">
                                <ul>
                                    <li><a href="https://twitter.com/meetupuy"                            target="_blank"><i class="fa fa-twitter-square"></i>twitter</a></li>
                                    <li><a href="https://www.facebook.com/meetupuy"                       target="_blank"><i class="fa fa-facebook-square"></i>facebook</a></li>
                                    <li><a href="https://www.youtube.com/user/meetupuy"                   target="_blank"><i class="fa fa-youtube-square"></i>youtube</a></li>
                                    <li><a href="https://plus.google.com/u/0/115708920691702747812/posts" target="_blank"><i class="fa fa-google-plus-square"></i>google+</a></li>
                                </ul>
                            </div>

                        </div>
                        <div class="nine columns alpha omega">
                            <a href="index.php">
                                <img src="../assets/images/2014/landing/logo-footer.png" alt="">
                            </a>
                            <p>“Un día de actualización profesional y Networking de la más alta calidad.”</p>
                            <a href="../codigo_de_conducta.php" class="code-of-conduct btn btn-blue">Código de Conducta</a>
                            <a STYLE="VISIBILITY:HIDDEN" class="hostedby" href="http://servergrove.com/" target="_blank">
                                <p><small>Hosted by</small></p>
                                <img src="../assets/images/2014/landing/sg230x35_g.png" alt="Hosted by ServerGrove">
                            </a>
                            <div class="made-with-love">hecho con <span class="heart">&#9829;</span> por <a target="_blank" href="http://twitter.com/trikanna">@trikanna</a></div>
                        </div>

                        <div class="clear"></div>



                    </section>

                </div>

            </footer>

        </div>

        <script src="../assets/javascripts/jquery.min.js"></script>
        <script src="../assets/javascripts/angular.min.js"></script>
        <script src="../assets/javascripts/modernizr.js"></script>

        <script src="../assets/javascripts/plugins.js"></script>
        <script src="../assets/javascripts/script.js"></script>
        <script src="../assets/javascripts/workshops.js"></script>

        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-34814216-1', 'meetup.uy');
            ga('send', 'pageview');

        </script>
    </body>
</html>
