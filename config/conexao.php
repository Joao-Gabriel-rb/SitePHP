<?php

class Conexao
{
    private static $conexao = null;

    public static function conectar()
    {
        if (self::$conexao === null) {
            $host = "localhost";
            $banco = "sitephp";
            $usuario = "root";
            $senha = "";

            try {
                self::$conexao = new PDO(
                    "mysql:host=$host;dbname=$banco;charset=utf8",
                    $usuario,
                    $senha
                );

                self::$conexao->setAttribute(
                    PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION
                );

            } catch (PDOException $e) {
                die("Erro na conexão com o banco: " . $e->getMessage());
            }
        }

        return self::$conexao;
    }
}
?>