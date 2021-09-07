<?php
    session_start();
    $usuario_Post = $_POST['user'];
    $senha_Post = $_POST['senha'];

    $usuario = 'ABC';//getenv("USER_GERA_FORMS");
    $senha = password_hash('123', PASSWORD_DEFAULT);//getenv("SENHA_GERA_FORMS");

    if($usuario_Post==$usuario && password_verify($senha_Post, $senha)){
        $tempo = time() + 60;
        setcookie("CookieUser", $usuario, $tempo);
        echo $_COOKIE['CookieUser'];
        //echo '<script> location = "../../index.php";</script>';
    } else{
        echo '<script> alert("Falha de Login!")</script>';
        echo '<script> location = "../../login.php";</script>';
    }

    // if(!($_POST['user']) && !($_POST['senha']=='')){
        

    //     $logins = array('usuario'=>'123', 'admin'=>'abc');
    //     if(isset($logins[$user]) && $logins[$user] == $senha){
            
    //         header('location: index.php');
    //     } else{
    //         setcookie("CookieUser");
    //         echo '<script> alert("Falha de Login!")</script>';
    //         echo '<script> location = "login.php";</script>';
    //     }
    // }else{
    //     echo '<script> alert("Preencha todos os campos.")</script>';
    //     echo '<script> location = "login.php";</script>';
    // }
?>