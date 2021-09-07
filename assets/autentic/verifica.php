<?php
    session_start();
    if(isset($_SESSION['Usuario']) && $_SESSION['Usuario'] != ''){
    } else{
        echo '<script> alert("Necessário autenticação!")</script>';
        echo '<script> location = "login.php";</script>';
    }
?>