<?php

require_once __DIR__ . "/../models/Tarefa.php";

class TarefaController
{
    private $tarefaModel;

    public function __construct()
    {
        $this->tarefaModel = new Tarefa();
    }

    public function cadastrar($titulo, $descricao)
    {
        if (!isset($_SESSION["usuario_id"])) {
            return [
                "sucesso" => false,
                "mensagem" => "Usuário não está logado."
            ];
        }

        $usuarioId = $_SESSION["usuario_id"];

        $resultado = $this->tarefaModel->cadastrar(
            $usuarioId,
            $titulo,
            $descricao
        );

        if ($resultado) {
            return [
                "sucesso" => true,
                "mensagem" => "Tarefa cadastrada com sucesso!"
            ];
        }

        return [
            "sucesso" => false,
            "mensagem" => "Erro ao cadastrar tarefa."
        ];
    }

    public function listar()
    {
        if (!isset($_SESSION["usuario_id"])) {
            return [];
        }

        return $this->tarefaModel->listarPorUsuario(
            $_SESSION["usuario_id"]
        );
    }

    public function buscarPorId($id)
    {
        if (!isset($_SESSION["usuario_id"])) {
            return null;
        }

        return $this->tarefaModel->buscarPorId(
            $id,
            $_SESSION["usuario_id"]
        );
    }

    public function atualizar($id, $titulo, $descricao)
    {
        if (!isset($_SESSION["usuario_id"])) {
            return [
                "sucesso" => false,
                "mensagem" => "Usuário não está logado."
            ];
        }

        $resultado = $this->tarefaModel->atualizar(
            $id,
            $_SESSION["usuario_id"],
            $titulo,
            $descricao
        );

        if ($resultado) {
            return [
                "sucesso" => true,
                "mensagem" => "Tarefa atualizada com sucesso!"
            ];
        }

        return [
            "sucesso" => false,
            "mensagem" => "Erro ao atualizar tarefa."
        ];
    }

    public function excluir($id)
    {
        if (!isset($_SESSION["usuario_id"])) {
            return [
                "sucesso" => false,
                "mensagem" => "Usuário não está logado."
            ];
        }

        $resultado = $this->tarefaModel->excluir(
            $id,
            $_SESSION["usuario_id"]
        );

        if ($resultado) {
            return [
                "sucesso" => true,
                "mensagem" => "Tarefa excluída com sucesso!"
            ];
        }

        return [
            "sucesso" => false,
            "mensagem" => "Erro ao excluir tarefa."
        ];
    }
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST["cadastrar"])) {

        $controller = new TarefaController();

        $resultado = $controller->cadastrar(
            $_POST["titulo"],
            $_POST["descricao"]
        );

        if ($resultado["sucesso"]) {
            header("Location: ../views/dashboard/index.php");
            exit;
        }

        echo $resultado["mensagem"];
    }

    if (isset($_POST["atualizar"])) {

        $controller = new TarefaController();

        $resultado = $controller->atualizar(
            $_POST["id"],
            $_POST["titulo"],
            $_POST["descricao"]
        );

        if ($resultado["sucesso"]) {
            header("Location: ../views/dashboard/index.php");
            exit;
        }

        echo $resultado["mensagem"];
    }

    if (isset($_POST["excluir"])) {

        $controller = new TarefaController();

        $resultado = $controller->excluir(
            $_POST["id"]
        );

        if ($resultado["sucesso"]) {
            header("Location: ../views/dashboard/index.php");
            exit;
        }

        echo $resultado["mensagem"];
    }
}
?>