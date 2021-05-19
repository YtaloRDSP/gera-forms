<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'sixsigma';
    
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS $database;";
    $conn->exec($sql);
    $conn = null;

    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "DROP TABLE Beneficiarios";
    $conn->exec($sql);

    echo "Cadastros Destruídos";
?>