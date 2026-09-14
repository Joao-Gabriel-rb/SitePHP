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
                <h2>Cadastro de Usuários</h2>
                
                <form method="post" action="inserirUsuario.php">
                    CPF: <input type="text" name="cpf"><br>
                    Nome: <input type="text" name="nome"><br>
                    senha: <input type="password" name="senha"><br>
                    <input type="submit" value="salvar"><br>
                </form>
                <hr>
                <?php
                include("conexao.php");
                $sql = "SELECT * FROM usuarios";
                $stmt = $conn->prepare($sql);
                ?>
                <table>
                    <tr>
                        <td>CPF</td>
                        <td>Nome</td>
                        <td>SENHA</td>
                        <td>ALTERAR</td>
                        <td>APAGAR</td>
                    </tr>

                <?php
                if($stmt){
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            ?>
                            <tr>
                                <form method="post" action="alterarUsuario.php">
                                    <input type="hidden" name="cpfanterior" value="<?= $row['cpf'] ?>">
                                    <td><input type="text" name="nome" value="<?= $row['nome'] ?>"></td>
                                    <td><input type="text" name="cpf" value="<?= $row['cpf'] ?>"></td>
                                    <td><input type="password" name="senha" value="<?= $row['senha'] ?>"></td>
                                    <td><input type="submit" value="alterar"></td>
                                </form>
                                <form method="post" action="apagarUsuario.php">
                                    <input type="hidden" name="cpf" value="<?= $row['cpf'] ?>">
                                    <td><input type="submit" value="apagar"></td>
                                </form>
                            </tr>

                            <?php
                           
                        }
                    }else{
                        echo 'nenhum usuario encontrado';
                    }
                }
                
                ?>
                </table>
            </div>



        </div>
    </body>
</html>   