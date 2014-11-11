#!/usr/bin/env php
<?php

exit('Los workshops ya fueron aprobados');


/**
 * @param PDO $pdo
 *
 * @return array
 */
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

            $matches = implode(', ', array_map(function ($w) use ($workshops1) {
                return $w.' ('.$workshops1[$w].')';
            }, $intersection));

            foreach ($intersection as $w) {
                $colisiones[$w][$email] = $ids[$email];
            }

            fwrite(STDOUT, sprintf("\033[1;32m%s\033[0m tiene colisiones: \033[1;33m%s\033[0m", $email, $matches).PHP_EOL);
        }
    }

    return $colisiones;
}

/**
 * @param PDO $pdo
 *
 * @return array
 */
function buscarRestantes(PDO $pdo)
{
    $restantes = array();
    $stmt1     = $pdo->prepare('SELECT workshop, count(DISTINCT email) AS cantidad, (IF("arduino" = workshop, 30, 40) - COUNT(DISTINCT email)) as restantes FROM workshops_colisiones WHERE aprobado = 1 GROUP by workshop ORDER BY cantidad DESC');
    $stmt1->execute();

    foreach ($stmt1->fetchAll() as $row) {
        $restantes[$row['workshop']] = $row['restantes'];
    }

    return $restantes;
}

/**
 * @param PDO $pdo
 * @param     $colisiones
 *
 * @return array
 */
function actualizarPrioridad(PDO $pdo, array $colisiones, $priodidad)
{
    $restantes = buscarRestantes($pdo);

    foreach ($restantes as $workshop => $numero) {
        if (0 == $numero) {
            continue;
        }

        $cols = array_map(function ($c) use ($pdo) {
            return $pdo->quote($c, PDO::PARAM_STR);
        }, array_keys($colisiones[$workshop]));

        $sql = 'UPDATE workshops_colisiones SET aprobado = 1 WHERE aprobado = 0 AND workshop = "'.$workshop.'" AND prioridad = '.$priodidad.' AND email NOT IN ('.implode(',', $cols).') LIMIT '.$numero.';';
        echo 'Aprobando ', $pdo->exec($sql), ' registrados para ', $workshop, PHP_EOL;
    }
}

try {
    /** @var PDO $pdo */
    $pdo = require __DIR__.'/../connection.php';

    $pdo->exec('UPDATE workshops_colisiones SET aprobado = 0 WHERE aprobado = 1');

    $colisiones = buscarColisiones($pdo);

    fwrite(STDOUT, PHP_EOL.'Aprobando con prioridad alta'.PHP_EOL);
    $pdo->exec('UPDATE workshops_colisiones SET aprobado = 1 WHERE prioridad = 0');

    fwrite(STDOUT, PHP_EOL.'Aprobando con prioridad media'.PHP_EOL);
    actualizarPrioridad($pdo, $colisiones, 1);

    fwrite(STDOUT, PHP_EOL.'Aprobando con prioridad baja'.PHP_EOL);

    actualizarPrioridad($pdo, $colisiones, 2);
    actualizarPrioridad($pdo, $colisiones, 3);

    $noAprobados = array();

    foreach (array_keys($colisiones) as $workshop) {
        $cols = array_map(function ($c) use ($pdo) {
            return $pdo->quote($c, PDO::PARAM_STR);
        }, array_keys($colisiones[$workshop]));

        $stmt = $pdo->prepare('select email from workshops_colisiones where workshop = :workshop and aprobado = 0 AND email NOT IN ('.implode(',', $cols).');');
        $stmt->bindValue(':workshop', $workshop);
        $stmt->execute();

        if ($stmt->rowCount()) {
            $noAprobados[$workshop] = array_map(function ($w) {
                return $w['email'];
            }, $stmt->fetchAll(PDO::FETCH_ASSOC));
        }

        unset($stmt);
    }

    var_export($noAprobados);
} catch (PDOException $e) {
    echo 'Problemas con la conexión:', PHP_EOL, $e->getMessage(), PHP_EOL;
    exit(1);
} catch (LogicException $e) {
    echo $e->getMessage(), PHP_EOL;
    exit(1);
}
