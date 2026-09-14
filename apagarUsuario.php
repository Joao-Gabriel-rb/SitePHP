<?php
include("valida.php");
include("conexao.php");

$cpf = $_POST['cpf'];

if($cpf == ''){
    die('digite um cpf');
}

$sql = "delete from usuarios where cpf = ?";

$stmt = $conn->prepare($sql);
if($stmt){
    $stmt->bind_param("s",$cpf);
    if($stmt->execute()){
        header("location: cadastroUsuarios.php");

    }else{
        echo 'erro ao apagar usuario';
    }    

}else{
    echo 'erro na sql';
}

?>