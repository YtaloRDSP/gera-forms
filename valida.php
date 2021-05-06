<?php
    session_start();

    if(!($_POST['usuario']=='') && !($_POST['senha']=='')){
        $user = $_POST['usuario'];
        $senha = $_POST['senha'];

        $logins = array('SixSigma'=>'#Lizman72#');
        if(isset($logins[$user]) && $logins[$user] == $senha){
            $tempo = time() + 24*60*60;
            setcookie("CookieUser", $user, $tempo);
            header('location: index.php');
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