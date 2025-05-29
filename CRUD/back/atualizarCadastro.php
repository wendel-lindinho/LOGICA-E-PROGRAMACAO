<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Cadastro</title>
    <link rel="stylesheet" href="../estilos/styleCadastrar.css">
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
            <form action="cadastro.php" method="post">
                <h2>Atualizar Cadastro</h2>

                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" required>

                <label for="sobrenome">Sobrenome:</label>
                <input type="text" name="sobrenome" id="sobrenome" required>

                <label for="email">E-mail:</label>
                <input type="email" name="email" id="email" required>

                <label for="curso">Selecione o curso:</label>
                <select name="curso" id="curso">
                    <option value="ads">Análise e Desenvolvimento de Sistemas</option>
                    <option value="engenharia_software">Engenharia de Software</option>
                    <option value="sistemas_informacao">Sistema da Informação</option>
                    <option value="ciencias_computacao">Ciências da Computação</option>
                </select>

                <input type="submit" value="Atualizar">
            </form>
        </section>

        <section>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "PUT") {
                mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

                try {
                    include("../conexao/conexao.php");

                    $nome = $_POST["nome"];
                    $sobrenome = $_POST["sobrenome"];
                    $email = $_POST["email"];
                    $curso = $_POST["curso"];

                    // Verifica se o e-mail já existe
                    $verifica = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
                    $verifica->bind_param("s", $email);
                    $verifica->execute();
                    $resultado = $verifica->get_result();

                    if ($resultado->num_rows > 0) {
                        // Se existe, faz UPDATE
                        $sql = "UPDATE usuarios SET nome = ?, sobrenome = ?, curso = ? WHERE email = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("ssss", $nome, $sobrenome, $curso, $email);
                        $stmt->execute();

                        echo "<div class='mensagem sucesso'>Cadastro atualizado com sucesso.</div>";
                        $stmt->close();
                    } else {
                        echo "<div class='mensagem erro'>Este e-mail não está cadastrado. Nenhuma atualização realizada.</div>";
                    }

                    $verifica->close();
                    $conn->close();
                } catch (mysqli_sql_exception $e) {
                    echo "<div class='mensagem erro'>Erro ao atualizar: " . $e->getMessage() . "</div>";
                }
            }

            // Mensagem de exclusão
            if (isset($_GET['excluido']) && $_GET['excluido'] == 1) {
                echo "<div class='mensagem sucesso'>Cadastro excluído com sucesso.</div>";
            }
            ?>
        </section>
    </main>
</body>
</html>
