<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interação com formularios</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="container">
        <h1>Cdastre-se</h1>

        <form action="processa.php" method= "post">
            <p>
                <label for="nome">Nome:</label>
                <input type="text" name= "nome" id="nome">
            </p>

            <p>
                <label for="sobrenome">Sobrenome</label>
                <input type="text" name="sobrenome" id="sobrenome">
            </p>

            <p>
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
            </p>

            <p>
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha">
            </p>

            <p>
            <input type="submit" value="Enviar" id="enviar">
            </p>

        </form>
</body>
</html>