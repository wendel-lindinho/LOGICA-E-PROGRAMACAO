<?php
$serverName = "localhost";
$userName = "root";
$passward = "";
$dbName = "faculdade";

// Criando conexão
$conn = new mysqli($serverName, $userName, $password, $dbName);

// Validando Conexão
if ($conn->connect_error){
    $erro = "Conexão Falhou";
}



?>