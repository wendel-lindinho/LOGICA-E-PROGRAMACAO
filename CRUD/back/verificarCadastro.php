<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Cadastro</title>
    <link rel="stylesheet" href="../estilos/styleVerificar.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../index.php">Início</a></li>
                <li><a href="cadatro.php">Cadastrar Usuário</a></li>
                <li><a href="">Listas Usuários</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="containerSection">
            <form action="verificarCadastro.php" method="post">
                <input type="email" placeholder="Informe o seu E-mail"
                name="email" id="email">
                <input type="submit" value="Buscar">
            </form>
        </section>
        <section>

            <?php

                // Verificar se o campo email está preenchido

                if(isset($_POST["email"])){
                     // Exibir informações passadas pelo form
                    // echo var_dump($_POST);

                    // Salva a informaçõa de email enviado pelo form
                    $email = $_POST["email"];

                    // Recebe as informações de conexão como DB
                    include("../conexao/conexao.php");

                    // Query ao banco de dados
                    $slq = "SELECT * FROM usuarios WHERE email = ?"

                    // Preparando a conexão junto da consulta
                    $stmt = $conn->prepare($sql);

                    // Validando se a conexão foi feita com sucesso
                    if($stmt){
                        // troca informação de email pela ? $sql
                        $stmt->bind_param("s , $email");
                        // Executar o comando
                        $stmt->execute();
                        //Salva o resultado da consulta
                        $resultado = $stmt->get_result();
                        echo var_dump($resultado);

                        if ($resultado->num_rowa > 0){
                            echo "ELE EXISTE";
                            // Armazenar as informações dele
                            $row = $resultado->fetch_assoc();
                            echo var_dump($row);

                        }else {
                            echo "ELE NÃO EXISTE";
                        }
                    }




                    }
            ?>

        </section>
    </main>

</body>
</html>