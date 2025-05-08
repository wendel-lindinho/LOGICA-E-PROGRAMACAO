<?php
$severName = "localhost";
$userName = "root";
$password = "";
$dbName = "faculdade";

$conn = new mysqli($serverName, $userName, $password, $dbName);



//validacao de conexao
if ($conn->connect_error){
    echo "Conexão Falhou";

}else {
    echo "Conexão feita com sucesso"; 
}




?>