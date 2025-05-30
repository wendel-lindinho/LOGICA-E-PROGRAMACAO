<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("../conexao/conexao.php");

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $email = $_POST["email"];
    $curso = $_POST["curso"];

    $sql = "UPDATE usuarios SET nome = ?, sobrenome = ?, email = ?, curso = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssssi", $nome, $sobrenome, $email, $curso, $id);
        if ($stmt->execute()) {
            // ✅ Redireciona com mensagem de sucesso
            header("Location: atualizarCadastro.php?mensagem=sucesso");
            exit();
        } else {
            header("Location: atualizarCadastro.php?mensagem=erro");
            exit();
        }
        $stmt->close();
    } else {
        header("Location: atualizarCadastro.php?mensagem=erro_preparacao");
        exit();
    }

    $conn->close();
}
?>
