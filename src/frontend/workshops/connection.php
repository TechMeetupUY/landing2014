<?php

$config   = require __DIR__.'/../config.php';
$dbConfig = $config['db'];

# Conexión PDO
return new PDO(strtr('mysql:dbname=__dbname;port=__port;host=__host', array(
    '__dbname' => $dbConfig['database'],
    '__port'   => isset($dbConfig['port']) ? $dbConfig['port'] : 3306,
    '__host'   => $dbConfig['host'],
)), $dbConfig['user'], $dbConfig['password']);
