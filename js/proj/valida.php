<?php
    session_start();

    if(!($_POST['usuario']=='') && !($_POST['senha']=='')){
        $user = $_POST['usuario'];
        $senha = $_POST['senha'];

        //if($user== getenv("Usuario") && $senha == getenv("Senha")){
        if($user == "123" && $senha='123'){
            $tempo = time() + 24*60*60;
            setcookie("CookieUser", $user, $tempo);
            header('location: ../../index.php');
        } else{
            setcookie("CookieUser");
            echo '<script> alert("Usuario/Senha incorretos!")</script>';
            echo '<script> location = "login.php";</script>';
        }
    }else{
        echo '<script> alert("Preencha todos os campos.")</script>';
        echo '<script> location = "login.php";</script>';
    }
?>