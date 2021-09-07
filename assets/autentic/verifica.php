<?php
    echo $_COOKIE['CookieUser'];
    if(!isset($_COOKIE['CookieUser']) || $_COOKIE['CookieUser'] == ''){
        echo '<script> alert("Necessário autenticação!")</script>';
        //echo '<script> location = "login.php";</script>';
    }
?>