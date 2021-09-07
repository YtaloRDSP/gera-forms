<?php
    session_start();
    $usuario_Post = $_POST['user'];
    $senha_Post = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $usuario = getenv("Usuario");
    $senha = getenv("Senha");

    if($usuario_Post==$usuario && password_verify($senha_Post, $senha)){
        $_SESSION['Usuario'] = $usuario;
        echo '<script> location = "../../index.php";</script>';
    } else{
        $_SESSION['Usuario'] = '';
        echo '<script> alert("Falha de Login!")</script>';
        echo '<script> location = "../../login.php";</script>';
    }
?>