<?php

require_once 'pdoConexion.php';

$resultado = 0;

$varAjaxCumple = $_POST['param0'];
$varAjaxObserv = $_POST['param1'];
$varAjaxCatalg = $_POST['param2'];
$varAjaxCabece = $_POST['param3'];

$consulta = $conn->prepare("INSERT INTO detallerevision17puntos (idCatalogo, idCabecera, cumple, observaciones) VALUES (:idCat, :idCab, :cump, :observ)");

$consulta ->bindParam(':idCat', $varAjaxCatalg, PDO::PARAM_INT);
$consulta ->bindParam(':idCab', $varAjaxCabece, PDO::PARAM_INT);
$consulta ->bindParam(':cump', $varAjaxCumple, PDO::PARAM_INT);
$consulta ->bindParam(':observ', $varAjaxObserv, PDO::PARAM_STR);

if($consulta->execute()){
    $resultado = 1;
}

echo $resultado;