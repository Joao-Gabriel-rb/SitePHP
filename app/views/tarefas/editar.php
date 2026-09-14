<?php

session_start();

if (!isset($_SESSION["usuario_id"])) {
    header("Location: ../auth/login.php");
    exit;
}

require_once __DIR__ . "/../../controllers/TarefaController.php";

if (!isset($_GET["id"])) {
    header("Location: ../dashboard/index.php");
    exit;
}

$controller = new TarefaController();

$tarefa = $controller->buscarPorId($_GET["id"]);

if (!$tarefa) {
    echo "Tarefa não encontrada.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Editar Tarefa</title>
</head>

<body>

    <h1>Editar Tarefa</h1>

    <form method="POST" action="../../controllers/TarefaController.php">

        <input
            type="hidden"
            name="id"
            value="<?php echo $tarefa["id"]; ?>"
        >

        <label>Título:</label>

        <br>

        <input
            type="text"
            name="titulo"
            value="<?php echo htmlspecialchars($tarefa["titulo"]); ?>"
            required
        >

        <br><br>

        <label>Descrição:</label>

        <br>

        <textarea
            name="descricao"
            rows="5"
            cols="40"
        ><?php echo htmlspecialchars($tarefa["descricao"]); ?></textarea>

        <br><br>

        <button type="submit" name="atualizar">
            Salvar alterações
        </button>

    </form>

    <br>

    <a href="../dashboard/index.php">
        Voltar para o Dashboard
    </a>

</body>

</html>