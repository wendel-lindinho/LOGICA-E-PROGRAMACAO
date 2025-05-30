<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Cadastro</title>
    <link rel="stylesheet" href="/LOGICA-E-PROGRAMACAO/CRUD/estilos/styleAtualizar.css">

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
            <form action="atualizarCadastro.php" method="post">
                <input type="email" placeholder="Informe seu E-mail:" name="email" id="email">
                <input type="submit" value="Buscar">
            </form>
        </section>
        <section>

        <section>
        <?php
            if (isset($_GET['mensagem'])) {
                if ($_GET['mensagem'] == 'sucesso') {
                    echo "<div class='mensagem sucesso'>Cadastro atualizado com sucesso!</div>";
                } elseif ($_GET['mensagem'] == 'erro') {
                    echo "<div class='mensagem erro'>Erro ao atualizar o cadastro.</div>";
                } elseif ($_GET['mensagem'] == 'erro_preparacao') {
                    echo "<div class='mensagem erro'>Erro ao preparar a consulta SQL.</div>";
                }
            }   
?>

              
      
        <?php 
            if (isset($_POST["email"])) {
                include("../conexao/conexao.php");

                $email = $_POST["email"];

                $sql = "SELECT * FROM usuarios WHERE email = ?";
                $stmt = $conn->prepare($sql);

                if ($stmt) {
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $resultado = $stmt->get_result();

                    if ($resultado->num_rows > 0) {
                        echo "
                        <form action='salvarAtualizacao.php' method='post' id='form-nota'>
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Sobrenome</th>
                                        <th>Email</th>
                                        <th>Curso</th>
                                    </tr>
                                </thead>
                                <tbody>";

                        while ($row = $resultado->fetch_assoc()) {
                            echo "
                                    <tr>
                                        <td>{$row['ID']}</td>
                                        <td>{$row['NOME']}</td>
                                        <td>{$row['SOBRENOME']}</td>
                                        <td>{$row['EMAIL']}</td>
                                        <td>{$row['CURSO']}</td>
                                    </tr>
                                    <tr>
                                        <td><input type='text' name='id' value='{$row['ID']}' readonly></td>
                                        <td><input type='text' name='nome' value='{$row['NOME']}' required></td>
                                        <td><input type='text' name='sobrenome' value='{$row['SOBRENOME']}' required></td>
                                        <td><input type='email' name='email' value='{$row['EMAIL']}' required></td>
                                        <td>
                                            <select name='curso' required>
                                                <option value='ads' " . ($row['CURSO'] == 'ads' ? 'selected' : '') . ">Análise e Desenvolvimento de Sistemas</option>
                                                <option value='engenharia_software' " . ($row['CURSO'] == 'engenharia_software' ? 'selected' : '') . ">Engenharia de Software</option>
                                                <option value='sistemas_informacao' " . ($row['CURSO'] == 'sistemas_informacao' ? 'selected' : '') . ">Sistemas de Informação</option>
                                                <option value='ciencias_computacao' " . ($row['CURSO'] == 'ciencias_computacao' ? 'selected' : '') . ">Ciências da Computação</option>
                                            </select>
                                        </td>
                                    </tr>";
                        }

                        echo "
                                </tbody>
                            </table>
                            <input type='submit' value='Atualizar'>
                        </form>";
                    } else {
                        echo "<div class='mensagem erro'>Nenhum usuário encontrado com esse e-mail.</div>";
                    }

                    $stmt->close();
                }

                $conn->close();
            }
            ?>

        </section>
    </main>
    
    
</body>
</html>