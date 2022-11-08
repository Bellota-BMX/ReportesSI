<?php

require_once 'pdoConfig.php';

$conectado = $exito = $error = '';

try {
    date_default_timezone_set("America/Mexico_City");
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $exito = "Conexion a $dbname en $host realizada exitosamente a las " . date("h:i:s a ");
    $conectado = true;
} catch (PDOException $pe) {
    $error = "No se pudo conectar a $dbname :" . $pe->getMessage();
    $conectado = false;
}