<?php

require_once 'pdoConexion.php';

$resultado = 0;

$varAjaxFirmaRealiza = $_POST['param1'];
$varAjaxnombreRealiza = $_POST['param2'];
$varAjaxFirmaAcepta = $_POST['param3'];
$varAjaxnombreAcepta = $_POST['param4'];
$varAjaxCabecera = $_POST['param0'];


$consulta = $conn->prepare(
    "INSERT INTO firmaRealiza (imgBase64, nombreRealiza, idCabecera) VALUES (:base1, :nmbr1, :idCab);
    INSERT INTO firmaAcepta (imgBase64, nombreAcepta, idCabecera) VALUES (:base2, :nmbr2, :idCab);"
);

$consulta->bindParam(':idCab', $varAjaxCabecera, PDO::PARAM_INT);
$consulta->bindParam(':base1', $varAjaxFirmaRealiza, PDO::PARAM_STR);
$consulta->bindParam(':nmbr1', $varAjaxnombreRealiza, PDO::PARAM_STR);
$consulta->bindParam(':base2', $varAjaxFirmaAcepta, PDO::PARAM_STR);
$consulta->bindParam(':nmbr2', $varAjaxnombreAcepta, PDO::PARAM_STR);

if ($consulta->execute()) {
    $resultado = 1;
}

echo $resultado;
