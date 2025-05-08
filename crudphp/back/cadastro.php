<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../estilos/styleCadastrar.css">
</head>

<body>

    <header>
        <nav>
            <ul>
                <li> <a href="">Inicio</a> </li>
                <li> <a href="">Cadastrar Usuário</a> </li>
                <li> <a href="">Lista Usuários</a> </li>
            </ul>
        </nav>
    </header>
    <main>
        <form action="cadastro.php" method="post">
            <h2>Cadastro Aluno</h2>

            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome">

            <label for="sobrenome">Sobrenome:</label>
            <input type="text" name="sobrenome" id="sobrenome">

            <label for="email">E-mail:</label>
            <input type="text" name="email" id="email">

            <label for="curso">selecione o curso:</label>
            <select name="curso" id="curso">
                <option value="ads">Análise e desenvolvimento de sistemas</option>
                <option value="engenharia_software">Engenharia de software</option>
                <option value="sistemas_informacao">Sistemas da informação</option>
                <option value="ciencia_computacao">Ciência da computação</option>
            </select>
            <input type="submit" value="Cadastrar">
        </form>

        <?php

            echo var_dump($_POST);


        ?>
    </main>


</body>

</html>