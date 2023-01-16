<?php

require_once 'pdoConexion.php';

$resultado = 0;

$varAjaxFirma = $_POST['param0'];
$varAjaxTipo = $_POST['param1'];
$varAjaxCabecera = $_POST['param2'];


$consulta = $conn->prepare("INSERT INTO firmascanvas (base64Img, idCabecera, tipo) VALUES (:base, :idCab, :tipo)");

$consulta ->bindParam(':base', $varAjaxFirma, PDO::PARAM_STR);
$consulta ->bindParam(':idCab', $varAjaxCabecera, PDO::PARAM_INT);
$consulta ->bindParam(':tipo', $varAjaxTipo, PDO::PARAM_INT);

if($consulta->execute()){
    $resultado = 1;
}

echo $resultado;