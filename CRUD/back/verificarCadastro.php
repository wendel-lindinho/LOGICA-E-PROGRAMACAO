<!DOCTYPE html>
<html lang="pt-br">

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
                <li><a href="cadastro.php">Cadastrar Usuário</a></li>
                <li><a href="">Listas Usuários</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="containerSection">
            <form action="verificarCadastro.php" method="post">
                <input type="email" placeholder="Informe seu E-mail:" name="email" id="email">
                <input type="submit" value="Buscar">
            </form>
        </section>
        <section>

            <?php

                //Verificar se o campo e-mail está preenchido
                if(isset($_POST["email"])){
                    //Exibir as informações passadas pelo form
                    // echo var_dump($_POST);

                    //Salva a informação de e-mail enviado pelo form
                    $email = $_POST["email"];

                    //Recebe as informações de conexão com o DB
                    include("../conexao/conexao.php");

                    //Query ao Banco de Dados
                    $sql = "SELECT * FROM usuarios WHERE email = ?";

                    //Preparar a conexão junto da consulta
                    $stmt = $conn->prepare($sql);

                    //Validando se a conexão foi feita com sucesso
                    if($stmt){
                        //Troca a informação de e-mail pela ? no $sql
                        $stmt->bind_param("s" , $email);
                        //Executa o comando 
                        $stmt->execute();
                        //Salva o resultado da consulta
                        $resultado = $stmt->get_result();
                        
                        
                        if ($resultado->num_rows > 0){
                            //Armazenar as informações vindas do DB
                            $row = $resultado->fetch_assoc();
                            
                            echo "                                
                                <table>
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>Sobrenome</th>
                                            <th>E-mail</th>
                                            <th>Excluir</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td>{$row['ID']}</td>
                                        <td>{$row['NOME']}</td>
                                        <td>{$row['SOBRENOME']}</td>
                                        <td>{$row['EMAIL']}</td>
                                        <td>
                                            <form action='excluirCadastro.php' method='post'>
                                                <input type='hidden' name='id' value='{$row['ID']}'>
                                                <input type='submit' id='btn-excluir' value='Excluir'>
                                            </form>
                                        </td>
                                    </tbody>
                                </table>
                                                            
                            ";

                        }else {
                            echo "<div class='mensagem erro'> E-mail $email não encontrado </div>";
                        }

                        //Encerra a consulta SQL
                        $stmt->close();
                    } else {
                        echo "<div class='mensagem erro'>Erro na consulta </div>";
                    }

                    //Encerra a conexão com o Banco de dados
                    $conn->close();

                }

            ?>

            <?php 
                if(isset($_GET['excluido']) && $_GET['excluido'] == 1) {
                    echo "<div class='mensagem sucesso'>Cadastro Excluído com sucesso </div>";
                }
            ?>

        </section>
    </main>

</body>

</html>