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

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Adicionar Tarefa - SitePHP</title>

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

            display: flex;
            justify-content: center;
            align-items: center;

            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 600px;
        }

        .card {
            background: white;
            padding: 40px;
            border-radius: 16px;

            box-shadow:
                0 10px 30px rgba(0, 0, 0, 0.10);
        }

        .titulo {
            font-size: 28px;
            color: #1f2937;
            margin-bottom: 8px;
        }

        .subtitulo {
            color: #6b7280;
            margin-bottom: 30px;
        }

        .campo {
            margin-bottom: 22px;
        }

        .campo label {
            display: block;
            margin-bottom: 8px;

            color: #374151;
            font-weight: bold;
        }

        .campo input,
        .campo textarea {
            width: 100%;

            padding: 13px;

            border: 1px solid #d1d5db;
            border-radius: 8px;

            font-family: Arial, Helvetica, sans-serif;
            font-size: 15px;

            outline: none;

            transition: 0.2s;
        }

        .campo input:focus,
        .campo textarea:focus {
            border-color: #6366f1;

            box-shadow:
                0 0 0 3px rgba(99, 102, 241, 0.15);
        }

        .campo textarea {
            resize: vertical;
            min-height: 130px;
        }

        .acoes {
            display: flex;
            align-items: center;
            gap: 12px;

            margin-top: 10px;
        }

        .botao {
            border: none;

            background: #4f46e5;
            color: white;

            padding: 13px 22px;

            border-radius: 8px;

            font-size: 15px;
            font-weight: bold;

            cursor: pointer;

            transition: 0.2s;
        }

        .botao:hover {
            background: #4338ca;
        }

        .voltar {
            text-decoration: none;

            background: #f3f4f6;
            color: #374151;

            padding: 13px 22px;

            border-radius: 8px;

            font-weight: bold;

            transition: 0.2s;
        }

        .voltar:hover {
            background: #e5e7eb;
        }

        @media (max-width: 500px) {

            .card {
                padding: 25px;
            }

            .acoes {
                flex-direction: column;
            }

            .botao,
            .voltar {
                width: 100%;
                text-align: center;
            }

        }

    </style>

</head>

<body>

    <div class="container">

        <div class="card">

            <h1 class="titulo">
                Adicionar Tarefa
            </h1>

            <p class="subtitulo">
                Crie uma nova tarefa para sua lista.
            </p>

            <form
                method="POST"
                action="../../controllers/TarefaController.php"
            >

                <div class="campo">

                    <label for="titulo">
                        Título
                    </label>

                    <input
                        type="text"
                        id="titulo"
                        name="titulo"
                        placeholder="Ex.: Estudar PHP"
                        required
                    >

                </div>

                <div class="campo">

                    <label for="descricao">
                        Descrição
                    </label>

                    <textarea
                        id="descricao"
                        name="descricao"
                        placeholder="Descreva os detalhes da tarefa..."
                    ></textarea>

                </div>

                <div class="acoes">

                    <button
                        type="submit"
                        name="cadastrar"
                        class="botao"
                    >
                        Adicionar tarefa
                    </button>

                    <a
                        href="../dashboard/index.php"
                        class="voltar"
                    >
                        Cancelar
                    </a>

                </div>

            </form>

        </div>

    </div>

</body>

</html>