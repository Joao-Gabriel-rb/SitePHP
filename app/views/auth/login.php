<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>

    <h1>Login</h1>

    <form method="POST" action="../../controllers/AuthController.php">

        <label>E-mail:</label>
        <input type="email" name="email" required>

        <br><br>

        <label>Senha:</label>
        <input type="password" name="senha" required>

        <br><br>

        <button type="submit" name="login">
            Entrar
        </button>

    </form>

    <br>

    <a href="cadastro.php">
        Ainda não possui uma conta? Cadastre-se
    </a>

</body>

</html>