<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - SitePHP</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
        }

        .container {
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }

        .card {
            background: white;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        }

        .titulo {
            text-align: center;
            margin-bottom: 10px;
            color: #1f2937;
            font-size: 30px;
        }

        .subtitulo {
            text-align: center;
            color: #6b7280;
            margin-bottom: 30px;
        }

        .campo {
            margin-bottom: 20px;
        }

        .campo label {
            display: block;
            margin-bottom: 8px;
            color: #374151;
            font-weight: bold;
        }

        .campo input {
            width: 100%;
            padding: 13px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 15px;
            outline: none;
            transition: 0.2s;
        }

        .campo input:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.15);
        }

        .botao {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 8px;
            background: #4f46e5;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
        }

        .botao:hover {
            background: #4338ca;
        }

        .login {
            text-align: center;
            margin-top: 25px;
            color: #6b7280;
        }

        .login a {
            color: #4f46e5;
            text-decoration: none;
            font-weight: bold;
        }

        .login a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="card">

            <h1 class="titulo">Criar conta</h1>

            <p class="subtitulo">
                Cadastre-se no SitePHP
            </p>

            <form method="POST" action="../../controllers/UsuarioController.php">

                <div class="campo">

                    <label for="nome">
                        Nome
                    </label>

                    <input
                        type="text"
                        id="nome"
                        name="nome"
                        placeholder="Digite seu nome"
                        required
                    >

                </div>

                <div class="campo">

                    <label for="email">
                        E-mail
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Digite seu e-mail"
                        required
                    >

                </div>

                <div class="campo">

                    <label for="senha">
                        Senha
                    </label>

                    <input
                        type="password"
                        id="senha"
                        name="senha"
                        placeholder="Digite sua senha"
                        required
                    >

                </div>

                <button
                    type="submit"
                    name="cadastrar"
                    class="botao"
                >
                    Criar conta
                </button>

            </form>

            <p class="login">
                Já possui uma conta?
                <a href="login.php">
                    Fazer login
                </a>
            </p>

        </div>

    </div>

</body>

</html>