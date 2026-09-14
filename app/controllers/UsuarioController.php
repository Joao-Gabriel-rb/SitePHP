<?php

require_once __DIR__ . "/../models/Usuario.php";

class UsuarioController
{
    private $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new Usuario();
    }

    public function cadastrar($nome, $email, $senha)
    {
        $usuarioExistente = $this->usuarioModel->buscarPorEmail($email);

        if ($usuarioExistente) {
            return [
                "sucesso" => false,
                "mensagem" => "Este e-mail já está cadastrado."
            ];
        }

        $resultado = $this->usuarioModel->cadastrar(
            $nome,
            $email,
            $senha
        );

        if ($resultado) {
            return [
                "sucesso" => true,
                "mensagem" => "Usuário cadastrado com sucesso!"
            ];
        }

        return [
            "sucesso" => false,
            "mensagem" => "Erro ao cadastrar usuário."
        ];
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST["cadastrar"])) {

        $controller = new UsuarioController();

        $resultado = $controller->cadastrar(
            $_POST["nome"],
            $_POST["email"],
            $_POST["senha"]
        );

        echo $resultado["mensagem"];
    }
}
?>