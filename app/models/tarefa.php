<?php

require_once __DIR__ . "/../../config/conexao.php";

class Tarefa
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::conectar();
    }

    public function cadastrar($usuarioId, $titulo, $descricao)
    {
        $sql = "INSERT INTO tarefas (usuario_id, titulo, descricao)
                VALUES (:usuario_id, :titulo, :descricao)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(":usuario_id", $usuarioId);
        $stmt->bindValue(":titulo", $titulo);
        $stmt->bindValue(":descricao", $descricao);

        return $stmt->execute();
    }

    public function listarPorUsuario($usuarioId)
    {
        $sql = "SELECT * FROM tarefas
                WHERE usuario_id = :usuario_id
                ORDER BY created_at DESC";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(":usuario_id", $usuarioId);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id, $usuarioId)
    {
        $sql = "SELECT * FROM tarefas
                WHERE id = :id
                AND usuario_id = :usuario_id";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(":id", $id);
        $stmt->bindValue(":usuario_id", $usuarioId);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar($id, $usuarioId, $titulo, $descricao)
    {
        $sql = "UPDATE tarefas
                SET titulo = :titulo,
                    descricao = :descricao
                WHERE id = :id
                AND usuario_id = :usuario_id";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(":id", $id);
        $stmt->bindValue(":usuario_id", $usuarioId);
        $stmt->bindValue(":titulo", $titulo);
        $stmt->bindValue(":descricao", $descricao);

        return $stmt->execute();
    }

    public function excluir($id, $usuarioId)
    {
        $sql = "DELETE FROM tarefas
                WHERE id = :id
                AND usuario_id = :usuario_id";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(":id", $id);
        $stmt->bindValue(":usuario_id", $usuarioId);

        return $stmt->execute();
    }
}
?>