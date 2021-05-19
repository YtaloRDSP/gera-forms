<?php
    if(!isset($_COOKIE['CookieUser']) || $_COOKIE['CookieUser'] == ''){
        echo '<script> alert("Necessário autenticação!")</script>';
        echo '<script> location = "js/proj/login.php";</script>';
    }
?>