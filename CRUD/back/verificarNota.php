<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Nota</title>
    <link rel="stylesheet" href="../estilos/styleVerificar.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../index.php">Início</a></li>
                <li><a href="cadastro.php">Cadastrar Usuário</a></li>
                <li><a href="verificarCadastro.php">Listas Usuários</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="containerSection">
            <form action="verificarNota.php" method="post">
                <select name="curso" id="curso" class="estilo">
                    <option value="ads">Análise e Desenvolvimento de Sistemas</option>
                    <option value="engenharia_software">Engenharia de Software</option>
                    <option value="sistemas_informacao">Sistema da Informação</option>
                    <option value="ciencias_computacao">Ciências da Computação</option>
                </select>
                <input type="submit" value="Buscar">
            </form>
        </section>
        <section>
            
            <?php 

                //Verificar se o $POST['CURSO'] está vazio
                if (isset($_POST["curso"])) {

                    //Chamar a conexão com o DB
                    include("../conexao/conexao.php");

                    //Salvar a informação do curso selecionado
                    $curso = $_POST["curso"];

                    //Consulta SQL
                    $sql = "SELECT * FROM usuarios WHERE curso = ?";
                    
                    //Preparar a consulta SQL junto da conexão
                    $stmt = $conn->prepare($sql);

                    //Verificar se a conexão foi bem-sucedida
                    if ($stmt) {
                        $stmt->bind_param("s" , $curso);
                        $stmt->execute();
                        $resultado = $stmt->get_result();
                        
                        if ($resultado->num_rows > 0) {
                            echo "
                                <table>
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>Sobrenome</th>
                                            <th>Nota Atividade</th>
                                            <th>Nota Prova</th>
                                            <th>Nota Final</th>
                                        </tr>
                                    </thead>
                                    <tbody> ";
                                        while($row = $resultado->fetch_assoc()){
                                        echo "
                                            <tr>
                                                <td>{$row['ID']}</td>
                                                <td>{$row['NOME']}</td>
                                                <td>{$row['SOBRENOME']}</td>
                                                <td>{$row['NOTA_ATIVIDADE']}</td>
                                                <td>{$row['NOTA_PROVA']}</td>
                                                <td>{$row['NOTA_FINAL']}</td>
                                            </tr> ";
                                        }
                            echo "
                                    </tbody>
                                </table>  
                            ";
                        } else {
                            echo "<div class = 'mensagem erro'>Esse $curso não possui registros de usuários</div>";
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