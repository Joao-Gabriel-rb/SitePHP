<?php

session_start();

if (!isset($_SESSION["usuario_id"])) {
    header("Location: ../auth/login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Adicionar Tarefa</title>
</head>

<body>

    <h1>Adicionar Tarefa</h1>

    <form method="POST" action="../../controllers/TarefaController.php">

        <label>Título:</label>
        <br>

        <input
            type="text"
            name="titulo"
            required
        >

        <br><br>

        <label>Descrição:</label>
        <br>

        <textarea
            name="descricao"
            rows="5"
            cols="40"
        ></textarea>

        <br><br>

        <button type="submit" name="cadastrar">
            Adicionar tarefa
        </button>

    </form>

    <br>

    <a href="../dashboard/index.php">
        Voltar para o Dashboard
    </a>

</body>

</html>