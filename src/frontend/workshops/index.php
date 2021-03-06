<?php

function getWorkshops()
{
    $quantities = array();

    try {
        # Conexión PDO
        $pdo = require __DIR__.'/connection.php';

        $stmt = $pdo->prepare('SELECT workshop, COUNT(1) as quantity FROM workshops GROUP BY workshop');
        $stmt->execute();

        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $quantities[$row['workshop']] = $row['quantity'];
        }
    } catch (PDOException $e) {
    }

    $workshops = include(__DIR__.'/../workshops.php');

    usort($workshops, function ($a, $b) {
        return strcmp($a["hora"], $b["hora"]);
    });

    $result = array_map(function ($workshop) use ($quantities) {
        $waitingList = isset($quantities[$workshop['key']]) && $quantities[$workshop['key']] >= $workshop['max'];

        return array(
            'key'    => $workshop['key'],
            'titulo' => '('.$workshop['hora'].') '.$workshop['titulo'].($waitingList ? '  *** lista de espera ***' : '')
        );
    }, $workshops);

    return $result;
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
        <base href="../">
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600' rel='stylesheet' type='text/css'/>

        <link rel="stylesheet" href="assets/css/screen.css">
    </head>
    <body>
        <header>

            <div class="container">
                <div class="header-menu sixteen columns clearfix">
                    <a href="index.php" class="three columns alpha logo-container">
                        <img src="assets/images/2014/landing/logo.png" alt="">
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

        <div class="container container-with-margins" style="top: 100px; padding-bottom: 100px;" ng-app="meetupWorkshops">
            <section class="sixteen columns workshops clearfix" style="border: solid 1px #EEE;">
                <h2>Chequea tu registro a los workshops</h2>

                <form name="checkForm" action="/workshops/" method="POST">
                    <fieldset style="width: 440px; margin: 0 auto;">
                        <div class="four columns" ng-class="{error: wsForm.nombre.$invalid && wsForm.$dirty}">
                            <input type="email" value="<?= @$_REQUEST['q'] ?>" name="q" id="workshop-email" placeholder="Tu email" style="width: 100%;" required/>
                        </div>
                        <div class="three columns" style="text-align: left;">
                            <button type="submit">Comprobar</button>
                        </div>

                    </fieldset>

                    <?php
                    if (isset($_REQUEST['q'])) {
                        try {
                            $email = $_REQUEST['q'];
                            if (!preg_match('/.+\@.+\..+/', $email)) {
                                throw new LogicException('El email es inválido.');
                            }

                            /** @var PDO $pdo */
                            $pdo = require __DIR__.'/connection.php';

                            $stmt = $pdo->prepare('SELECT workshop FROM workshops_colisiones WHERE aprobado = 1 AND email = :email');
                            $stmt->bindValue(':email', $email);
                            $stmt->execute();

                            if (0 === $stmt->rowCount()) :?>
                                <div class="error">No te registraste a ningún workshop con el email <?= $email ?></div>
                            <?php
                            else:
                                ?>
                                <p>
                                <strong>Estás registrado en los siguientes workshops:</strong>
                                <br/>
                                <?php
                                $workshops = require __DIR__.'/../workshops.php';
                                $map       = array_map(function ($w) use ($workshops) {
                                    foreach ($workshops as $workshop) {
                                        if ($w['workshop'] === $workshop['key']) {
                                            return $workshop['titulo'];
                                        }
                                    }
                                }, $stmt->fetchAll(PDO::FETCH_ASSOC));

                                foreach ($map as $workshop): ?>
                                    <div><?= $workshop ?></div>
                                <?php endforeach;
                                ?></p><?php
                            endif;
                        } catch (LogicException $e) {
                            ?>
                            <div class="error"><?= $e->getMessage() ?></div>
                        <?php
                        } catch (Exception $e) {
                        }
                    }
                    ?>
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
                                    <li>
                                        <a href="https://twitter.com/meetupuy" target="_blank"><i class="fa fa-twitter-square"></i>twitter</a>
                                    </li>
                                    <li>
                                        <a href="https://www.facebook.com/meetupuy" target="_blank"><i class="fa fa-facebook-square"></i>facebook</a>
                                    </li>
                                    <li>
                                        <a href="https://www.youtube.com/user/meetupuy" target="_blank"><i class="fa fa-youtube-square"></i>youtube</a>
                                    </li>
                                    <li>
                                        <a href="https://plus.google.com/u/0/115708920691702747812/posts" target="_blank"><i class="fa fa-google-plus-square"></i>google+</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <div class="nine columns alpha omega">
                            <a href="index.php">
                                <img src="assets/images/2014/landing/logo-footer.png" alt="">
                            </a>

                            <p>“Un día de actualización profesional y Networking de la más alta calidad.”</p>
                            <a href="codigo_de_conducta.php" class="code-of-conduct btn btn-blue">Código de Conducta</a>
                            <a STYLE="VISIBILITY:HIDDEN" class="hostedby" href="http://servergrove.com/" target="_blank">
                                <p>
                                    <small>Hosted by</small>
                                </p>
                                <img src="assets/images/2014/landing/sg230x35_g.png" alt="Hosted by ServerGrove">
                            </a>

                            <div class="made-with-love">hecho con <span class="heart">&#9829;</span> por
                                <a target="_blank" href="http://twitter.com/trikanna">@trikanna</a></div>
                        </div>

                        <div class="clear"></div>


                    </section>

                </div>

            </footer>

        </div>

        <script src="assets/javascripts/jquery.min.js"></script>
        <script src="assets/javascripts/angular.min.js"></script>
        <script src="assets/javascripts/modernizr.js"></script>

        <script src="assets/javascripts/plugins.js"></script>
        <script src="assets/javascripts/script.js"></script>
        <script src="assets/javascripts/workshops.js"></script>

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
