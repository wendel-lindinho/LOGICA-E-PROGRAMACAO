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
                <li><a href="cadastro.php"> Usuário</a></li>
                <li><a href="verificarCadastro.php">Listas Usuários</a></li>
            </ul>
        </nav>
    </header>

    <main>
        
        
        <section id= "containerSection">
            <form action="verificarCadastro.php" method="post">
                <input type="email" placeholder="Informe seu E-mail:" name="email" id="email">
                <input type="submit" value="Buscar">
            </form>
            
            
        </section>
        <section>
            <?php

//verificar se o campo email esta preenchido
if(isset($_POST["email"])){
    
    //exibir as informações pelo form
    //  echo var_dump($POST)
    
    //salva a informação enviada pelo form
    $email = $POST["email"];
    
    //recebe as informações de conexão ao db
    include("../conexao/conexao.php");
    
    //query ao banco de dados
    $sql = "SELECT * FROM usuarios WHERE email = ? ";
    
    //preparar a conexão junto da consulta
    $stmt = $conn->prepare($sql);
    
    //Valido se 
    
    if($stmt){
        $stmt->bind_param("s", $email);

        $stmt->execute();
        
        $resultado = $stmt->get_result();
        
        if($resultado->num_rows > 0){
            //armazenar no db



            $row = $resultado->fetch_assoc();
            echo"<table>
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
                <td>{$row['Nome']}</td>
                <td>{$row['Sobrenome']}</td>
                <td>{$row['E-mail']}</td>
                <td>
                    <form action='excluirCadastro.php' method='post'>
                        <input type='hidden' name='id' value='{$row['ID']}'>
                        <input type='submit' id='btn-excluir' value='Excluir'>
                    </form>


                </td>
            </tbody>
        </table>";
            
           
            
        }else {
            echo "<div class='mensagem erro'>E-mail $email não encontrado</div>";
        }

        $stmt->close();
    }else {
        echo "<div class='mensagem erro'>Erro na consulta</div>"
    }
    $conn->close();
    
}




?>

</section>
</main>

</body>
</html>