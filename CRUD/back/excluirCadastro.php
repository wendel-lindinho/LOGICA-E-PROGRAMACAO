<?php

    if(isset($_POST['id'])){
        include("../conexao/conexao.php");

        $id = $_POST['id'];

        //Prepara a consulta SQL para excluir o cadastro
        $sql = "DELETE FROM usuarios WHERE ID = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("i", $id);
            //Executa a query
            $stmt->execute();

            //Redirecionar o usuário
            header("Location: verificarCadastro.php?excluido=1");
            $stmt->close();
        } else {
            echo "<div class='mensagem erro'> Erro consulta </div>";
        }

        $conn->close();

    }


?>