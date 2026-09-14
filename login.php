<?php
include("conexao.php");

$cpf = $_POST['cpf'];
$senha = $_POST['senha'];


if($cpf == ''){
    die('digite um cpf');
}
if ($senha == ''){
    die('digite uma senha');
}

$sql = "SELECT nome FROM usuarios WHERE cpf = ? AND senha = ? ";

$stmt = $conn->prepare($sql);
if($stmt){
    $stmt->bind_param("ss",$cpf,$senha);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        if($row['nome'] != ''){
            session_start();
            $_SESSION['cpf'] = $cpf;
            $_SESSION['senha'] = $senha;
            $_SESSION['nome'] = $row['nome'];
            header('Location: principal.php');
        }else{
            echo 'usuário ou senha não encontrados';
        }
    }else{
        echo 'usuário ou senha não encontrados';
    }

}else{
    echo 'erro na sql';
}


if($cpf == '123' && $senha == '456'){
    echo 'login ok';
    session_start();
    $_SESSION['cpf'] = $cpf;
    $_SESSION['senha'] = $senha;
    $_SESSION['nome'] = 'fulano';
    header('Location: principal.php');
}else{
    echo 'erro no login';
}
?>