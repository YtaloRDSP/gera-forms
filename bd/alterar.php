<?php
    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

    $servername = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $database = 'heroku_1d16e51af604e58';

    $id = (int)$_GET['id'];
    $ch = $_GET['ch'];

    try {
        $conn = new PDO("mysql:host=$servername", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE IF NOT EXISTS $database;";
        $conn->exec($sql);
        $conn = null;

        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE Atividades SET CH='$ch' WHERE id=$id";
        $conn->exec($sql);
        
    } catch(PDOException $e) {
        echo $stmt . '<br>' . $e->getMessage();
    }
    $conn = null;
?>