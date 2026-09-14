<?php

session_start();

if (!isset($_SESSION["usuario_id"])) {
    header("Location: ../auth/login.php");
    exit;
}

require_once __DIR__ . "/../../controllers/TarefaController.php";

$controller = new TarefaController();

$tarefas = $controller->listar();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>

<body>

    <h1>Dashboard</h1>

    <h2>
        Bem-vindo,
        <?php echo htmlspecialchars($_SESSION["usuario_nome"]); ?>!
    </h2>

    <p>
        Aqui estão suas tarefas:
    </p>

    <a href="../tarefas/criar.php">
        + Adicionar tarefa
    </a>

    <hr>

    <?php if (empty($tarefas)): ?>

        <p>
            Você ainda não possui tarefas.
        </p>

    <?php else: ?>

        <?php foreach ($tarefas as $tarefa): ?>

            <div>

                <h3>
                    <?php echo htmlspecialchars($tarefa["titulo"]); ?>
                </h3>

                <p>
                    <?php echo htmlspecialchars($tarefa["descricao"]); ?>
                </p>

                <a
                    href="../tarefas/editar.php?id=<?php echo $tarefa["id"]; ?>"
                >
                    Editar
                </a>

                <form
                    method="POST"
                    action="../../controllers/TarefaController.php"
                    style="display: inline;"
                >

                    <input
                        type="hidden"
                        name="id"
                        value="<?php echo $tarefa["id"]; ?>"
                    >

                    <button
                        type="submit"
                        name="excluir"
                        onclick="return confirm('Deseja realmente excluir esta tarefa?');"
                    >
                        Excluir
                    </button>

                </form>

            </div>

            <hr>

        <?php endforeach; ?>

    <?php endif; ?>

</body>

</html>