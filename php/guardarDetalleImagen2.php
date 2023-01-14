<?php

require_once 'pdoConexion.php';

$resultado = 0;

$varAjaxCumple = $_POST['param0'];
$varAjaxObserv = $_POST['param1'];
$varAjaxCatalg = $_POST['param2'];
$varAjaxCabece = $_POST['param3'];
$varAjaxImg = $_POST['param4'];
$varAjaxImgNuevo = $_POST['param5'];

$oldname = "upload/" . $varAjaxImg;
$newname = "upload/" . $varAjaxImgNuevo;

rename($oldname, $newname);

$consulta = $conn->prepare("INSERT INTO detallerevision17puntos (idCatalogo, idCabecera, cumple, observaciones,img) VALUES (:idCat, :idCab, :cump, :observ, :img)");

$consulta ->bindParam(':idCat', $varAjaxCatalg, PDO::PARAM_INT);
$consulta ->bindParam(':idCab', $varAjaxCabece, PDO::PARAM_INT);
$consulta ->bindParam(':cump', $varAjaxCumple, PDO::PARAM_INT);
$consulta ->bindParam(':observ', $varAjaxObserv, PDO::PARAM_STR);
$consulta ->bindParam(':img', $varAjaxImgNuevo, PDO::PARAM_STR);

if($consulta->execute()){
    $resultado = 1;
}

echo $resultado;