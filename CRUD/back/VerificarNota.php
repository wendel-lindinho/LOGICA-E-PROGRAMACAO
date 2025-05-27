<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Nota   </title>
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
        <section>
            <form action="verificarNota.php" method="post">
                <select name="curso" id="curso" class="estilo">
                    <option value="ads">Análise e Desenvolvimento de Sistemas</option>
                    <option value="engenharia_software">Engenharia de Software</option>
                    <option value="sistemas_informacao">Sitema da Informação</option>
                    <option value="ciencias_computacao">Ciências da Computação</option>
                </select>
            </form>
        </section>
        <section>
        <?php
                // Verificar se o $POST['curso'] está vazio
                if (isset($_POST['curso'])){

                    // Chamar a conexao com o db
                    include("../conexao/conexao.php");

                    // Salvar a informação do crso selecionado
                    $curso = $_POST["curso"];

                    // cunsulta sql
                    $sql = "SELECT * FROM usuarios WHERE curso = ?";

                    // preparar a consulta sql junto da conexao
                    $stmt = $conn->prepare($sql);

                    // verificar se a conexao foi bem-sucedida
                    if ($stmt) {
                        $stmt->bind_param("s" ,$curso);
                        $stmt->execute();
                        $resultado = $stmt->get_result();
                        
                        if($resultado->num_rows > 0){
                            echo "
                            <table>
                                    <thead>
                                        <tr>
                                            <td>ID</td>
                                            <td>Nome</td>
                                            <td>Sobrenome</td>
                                            <td>Nota Atividade</td>
                                            <td>Nota Prova</td>
                                            <td>Nota Final</td>
                                        </tr>
                                    </thead>
                                    <tbody>";
                                        while($row = $resultado->fetch_assoc()){
                                        echo "
                                             <tr>
                                            <td>{$row['ID']}</td>
                                            <td>{$row['NOME']}</td>
                                            <td>{$row['SOBRENOME']}</td>
                                            <td>{$row['NOTA_ATIVIDADE']}</td>
                                            <td>{$row['NOTA_PROVA']}</td>
                                            <td>{$row['NOTA_FINAL']}</td>
                                            </tr>";
                                    }
                            echo "
                                    </tbody>
                                </table>
                            ";
                        } 
                    }

                }

                ?>
        </section>
    </main>
</body>
</html>