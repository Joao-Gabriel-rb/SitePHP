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

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Dashboard - SitePHP</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            min-height: 100vh;
            background: #f3f4f6;
            color: #1f2937;
        }

        .topo {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            color: white;
            padding: 25px 40px;
        }

        .topo-conteudo {
            max-width: 1100px;
            margin: 0 auto;

            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .topo h1 {
            font-size: 28px;
            margin-bottom: 6px;
        }

        .topo p {
            opacity: 0.9;
        }

        .botao-sair {
            text-decoration: none;
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.7);
            padding: 10px 18px;
            border-radius: 8px;
            transition: 0.2s;
        }

        .botao-sair:hover {
            background: white;
            color: #4f46e5;
        }

        .conteudo {
            max-width: 1100px;
            margin: 0 auto;
            padding: 35px 20px;
        }

        .cabecalho-tarefas {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
        }

        .cabecalho-tarefas h2 {
            font-size: 24px;
        }

        .botao-adicionar {
            text-decoration: none;
            background: #4f46e5;
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.2s;
        }

        .botao-adicionar:hover {
            background: #4338ca;
        }

        .lista {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }

        .tarefa {
            background: white;
            border-radius: 12px;
            padding: 22px;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.08);
            border: 1px solid #e5e7eb;
        }

        .tarefa h3 {
            font-size: 20px;
            margin-bottom: 12px;
            color: #111827;
        }

        .tarefa p {
            color: #6b7280;
            line-height: 1.5;
            min-height: 45px;
            margin-bottom: 20px;
        }

        .acoes {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .botao-editar {
            text-decoration: none;
            background: #eef2ff;
            color: #4f46e5;
            padding: 9px 15px;
            border-radius: 7px;
            font-weight: bold;
        }

        .botao-excluir {
            border: none;
            background: #fee2e2;
            color: #dc2626;
            padding: 9px 15px;
            border-radius: 7px;
            font-weight: bold;
            cursor: pointer;
        }

        .botao-editar:hover {
            background: #e0e7ff;
        }

        .botao-excluir:hover {
            background: #fecaca;
        }

        .vazio {
            background: white;
            border: 1px dashed #d1d5db;
            border-radius: 12px;
            padding: 45px 20px;
            text-align: center;
            color: #6b7280;
        }

        .vazio p {
            margin-bottom: 20px;
        }

        @media (max-width: 600px) {

            .topo {
                padding: 20px;
            }

            .topo-conteudo {
                align-items: flex-start;
                flex-direction: column;
            }

            .cabecalho-tarefas {
                align-items: flex-start;
                flex-direction: column;
            }

            .botao-adicionar {
                width: 100%;
                text-align: center;
            }

        }

    </style>

</head>

<body>

    <header class="topo">

        <div class="topo-conteudo">

            <div>

                <h1>SitePHP</h1>

                <p>
                    Bem-vindo,
                    <?php echo htmlspecialchars($_SESSION["usuario_nome"]); ?>!
                </p>

            </div>

            <a
                class="botao-sair"
                href="../../controllers/LogoutController.php"
            >
                Sair
            </a>

        </div>

    </header>

    <main class="conteudo">

        <div class="cabecalho-tarefas">

            <h2>Minhas tarefas</h2>

            <a
                class="botao-adicionar"
                href="../tarefas/criar.php"
            >
                + Adicionar tarefa
            </a>

        </div>

        <?php if (empty($tarefas)): ?>

            <div class="vazio">

                <p>
                    Você ainda não possui tarefas cadastradas.
                </p>

                <a
                    class="botao-adicionar"
                    href="../tarefas/criar.php"
                >
                    Criar primeira tarefa
                </a>

            </div>

        <?php else: ?>

            <div class="lista">

                <?php foreach ($tarefas as $tarefa): ?>

                    <div class="tarefa">

                        <h3>
                            <?php
                            echo htmlspecialchars($tarefa["titulo"]);
                            ?>
                        </h3>

                        <p>
                            <?php
                            echo htmlspecialchars($tarefa["descricao"]);
                            ?>
                        </p>

                        <div class="acoes">

                            <a
                                class="botao-editar"
                                href="../tarefas/editar.php?id=<?php echo $tarefa["id"]; ?>"
                            >
                                Editar
                            </a>

                            <form
                                method="POST"
                                action="../../controllers/TarefaController.php"
                            >

                                <input
                                    type="hidden"
                                    name="id"
                                    value="<?php echo $tarefa["id"]; ?>"
                                >

                                <button
                                    class="botao-excluir"
                                    type="submit"
                                    name="excluir"
                                    onclick="return confirm('Deseja realmente excluir esta tarefa?');"
                                >
                                    Excluir
                                </button>

                            </form>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </main>

</body>

</html>