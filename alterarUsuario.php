<?php
include("valida.php");
include("conexao.php");

$cpf = $_POST['cpf'];
$senha = $_POST['senha'];
$nome = $_POST['nome'];
$cpfanterior = $_POST['cpfanterior'];

if($cpf == ''){
    die('digite um cpf');
}
if ($senha == ''){
    die('digite uma senha');
}
if ($nome == ''){
    die('digite um nome');
}
if ($cpfanterior == ''){
    die('cpf anterior vazio');
}

$sql = "update usuarios set cpf = ?, senha = ?, nome = ? where cpf = ?";

$stmt = $conn->prepare($sql);
if($stmt){
    $stmt->bind_param("ssss",$cpf,$senha,$nome,$cpfanterior);
    if($stmt->execute()){
        header("location: cadastroUsuarios.php");

    }else{
        echo 'erro ao alterar usuario';
    }    

}else{
    echo 'erro na sql';
}

?>