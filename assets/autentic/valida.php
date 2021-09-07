<?php
    session_start();
    $usuario_Post = $_POST['user'];
    $senha_Post = $_POST['senha'];//password_hash(, PASSWORD_DEFAULT);

    $usuario = getenv("Usuario");
    $senha = getenv("Senha");
    echo $usuario;
    echo '<br>';
    echo $senha;
    echo '<br>';
    echo $usuario_Post;
    echo '<br>';
    echo $senha_Post;
    echo '<br>';

    if($usuario_Post==$usuario && password_verify($senha_Post, $senha)){
        $_SESSION['Usuario'] = $usuario;
        echo '<script> location = "../../index.php";</script>';
    } else{
        $_SESSION['Usuario'] = '';
        echo '<script> alert("Falha de Login!")</script>';
        echo '<script> location = "../../login.php";</script>';
    }
?>