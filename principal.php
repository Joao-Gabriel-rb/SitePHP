<?php

include("valida.php");

?>

<html>
    <head>
        <title>Principal</title>
    </head>
    <body>
        <div style="width:1200px; margin: 0 auto;">
            <div style="min-height: 100px; width: 100%; background-color:bisque">
                <div style="width: 50%; float:left">
                    <span style="padding-left: 10px;"><?= 'Olá ' .$_SESSION['nome']; ?></span>
                </div>
                <div style="width: 50%; float:right; text-align: right">
                    <span style="padding-right: 10px;"><a href="sair.php">Sair</a></span>
                </div>
            </div>

            <div style="width: 200px; background-color:lightyellow; min-height: 400px; float: left;">
                <span>
                    <a href="cadastroUsuarios.php">Cadastro de Usuários</a>
                </span>
            </div>
            <div style="background-color:lightyellow; min-height: 400px; float: left; Width: 1000px;">
                <h2>Pagina Principal</h2>
                <p> Conteúdo </p>
            </div>



        </div>
    </body>
</html>   