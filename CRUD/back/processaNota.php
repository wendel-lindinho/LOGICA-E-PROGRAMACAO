<?php

    include("../conexao/conexao.php");
    $nota_atividade = $_POST['nota_atividade'];
    $nota_prova = $_POST['nota_prova'];

    echo var_dump($nota_atividade);
    echo var_dump($nota_prova);
    
    foreach($nota_atividade as $id=> $nota){
        $nota_prova_individual = $nota_prova[$id];
        $nota_final = ($nota * 0.3 + $nota_prova_individual *0.7 );
    
        $sql = "UPDATE usuarios SET NOTA_ATIVIDADE = ?,
                                    NOTA_PROVA = ?,
                                    NOTA_FINAL = ?
                                    WHERE ID = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("dddi", $nota, $nota_prova_individual, $nota_final, $id);
        $stmt->execute();       
    $stmt->close();
    $conn->close();
    header("location: atualizarNota.php");
    }
?>