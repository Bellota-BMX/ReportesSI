<?php

require_once 'pdoConexion.php';

$resultado = 0;

$varAjaxFecha = $_POST['param0'];
$varAjaxHEntrada = $_POST['param1'];
$varAjaxHSalida = $_POST['param2'];
$varAjaxPOrigen = $_POST['param3'];
$varAjaxPProced = $_POST['param4'];
$varAjaxPDest = $_POST['param5'];
$varAjaxTMerca = $_POST['param6'];
$varAjaxNEmpre = $_POST['param7'];

$consulta = $conn->prepare("INSERT INTO cabecerarevision17puntos (fecha, hEntrada, hSalida, pOrigen, pProcedencia, pDestino, tipoMercancia, empresaTransporte) VALUES (:f, :hE, :hS, :pO, :pP, :pD, :tM, :eT)");

$consulta->bindParam(':f', $varAjaxFecha, PDO::PARAM_STR);
$consulta->bindParam(':hE', $varAjaxHEntrada, PDO::PARAM_STR);
$consulta->bindParam(':hS', $varAjaxHSalida, PDO::PARAM_STR);
$consulta->bindParam(':pO', $varAjaxPOrigen, PDO::PARAM_STR);
$consulta->bindParam(':pP', $varAjaxPProced, PDO::PARAM_STR);
$consulta->bindParam(':pD', $varAjaxPDest, PDO::PARAM_STR);
$consulta->bindParam(':tM', $varAjaxTMerca, PDO::PARAM_STR);
$consulta->bindParam(':eT', $varAjaxNEmpre, PDO::PARAM_STR);

if ($consulta->execute()) {

    $resultado = 1;
}

echo $resultado;
