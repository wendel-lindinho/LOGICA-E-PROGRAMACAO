<?php

    if(isset($_POST['id'])){
        include("../conexao/conexao.php");
        $id = $_POST['id'];

        //prepara a consulta para excluir cadastro
        $sql = "DELETE FROM usuarios WHERE ID= ?"
        $stmt = $conn->prepare(sql);

        if ($stmt){
            $stmt->bind_param("i", $id);
            //execulta a query
            $stmt->execute();

            //redirecionar o usuario
            header("locatoin: verificarCadastro.php");
            $stmt->close();
        } else {
              echo "<div class='mensagem erro'>Erro na consulta</div>"
        }

        $conn->close(); 
    
    
    
    }





?>
