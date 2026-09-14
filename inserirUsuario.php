<?php
include("valida.php");
include("conexao.php");

$cpf = $_POST['cpf'];
$senha = $_POST['senha'];
$nome = $_POST['nome'];

if($cpf == ''){
    die('digite um cpf');
}
if ($senha == ''){
    die('digite uma senha');
}
if ($nome == ''){
    die('digite um nome');
}

$sql = "insert into usuarios (cpf, senha, nome) values (?, ?, ?)";

$stmt = $conn->prepare($sql);
if($stmt){
    $stmt->bind_param("sss",$cpf,$senha,$nome);
    if($stmt->execute()){
        header("location: cadastroUsuarios.php");

    }else{
        echo 'erro ao inserir usuario';
    }    

}else{
    echo 'erro na sql';
}

?>