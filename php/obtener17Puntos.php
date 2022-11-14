<?php

require_once 'pdoConexion.php';

$consulta = $conn->query("SELECT * FROM  puntoevaluar17p");

$array_data = array();

while ($valoresConsulta = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $array_data[] = $valoresConsulta;
}

echo json_encode($array_data, JSON_UNESCAPED_UNICODE);