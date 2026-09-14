<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
</head>

<body>

    <h1>Cadastro</h1>

    <form method="POST" action="../../controllers/UsuarioController.php">

        <label>Nome:</label>
        <input type="text" name="nome" required>

        <br><br>

        <label>E-mail:</label>
        <input type="email" name="email" required>

        <br><br>

        <label>Senha:</label>
        <input type="password" name="senha" required>

        <br><br>

        <button type="submit" name="cadastrar">
            Cadastrar
        </button>

    </form>

</body>

</html>