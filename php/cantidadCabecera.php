<?php

require_once 'pdoConexion.php';

$varAJAX1 = $_POST['param0'];
$varAJAX2 = $_POST['param1'];
$varAJAX3 = $_POST['param2'];

$consulta = $conn->prepare("SELECT idCabecera FROM cabecerarevision17puntos WHERE fecha = '$varAJAX1' AND hEntrada = '$varAJAX2' AND hSalida = '$varAJAX3'");

$consulta -> execute();

$row = $consulta->fetch();

echo $row ["idCabecera"];