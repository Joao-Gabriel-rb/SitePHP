<?php

session_start();

require_once __DIR__ . "/../models/Usuario.php";

class AuthController
{
    private $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new Usuario();
    }

    public function login($email, $senha)
    {
        $usuario = $this->usuarioModel->buscarPorEmail($email);

        if (!$usuario) {
            return [
                "sucesso" => false,
                "mensagem" => "E-mail ou senha incorretos."
            ];
        }

        if (!password_verify($senha, $usuario["senha"])) {
            return [
                "sucesso" => false,
                "mensagem" => "E-mail ou senha incorretos."
            ];
        }

        $_SESSION["usuario_id"] = $usuario["id"];
        $_SESSION["usuario_nome"] = $usuario["nome"];
        $_SESSION["usuario_email"] = $usuario["email"];

        return [
            "sucesso" => true,
            "mensagem" => "Login realizado com sucesso!"
        ];
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST["login"])) {

        $controller = new AuthController();

        $resultado = $controller->login(
            $_POST["email"],
            $_POST["senha"]
        );

        if ($resultado["sucesso"]) {
            header("Location: ../views/dashboard/index.php");
            exit;
        }

        echo $resultado["mensagem"];
    }
}
?>