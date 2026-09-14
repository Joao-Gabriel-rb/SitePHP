<?php

require_once __DIR__ . "/../models/Tarefa.php";

class TarefaFactory
{
    public static function criar()
    {
        return new Tarefa();
    }
}
?>

