<?php

    include("credenciais.php");
    session_start();

    if(!($_POST['item']=='') && !($_POST['descricao']=='')){
        try {
            $conn = new PDO("mysql:host=$servername", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CREATE DATABASE IF NOT EXISTS $database;";
            $conn->exec($sql);
            $conn = null;

            $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = 'CREATE TABLE IF NOT EXISTS Atividades (
                Numero INT(2) NOT NULL PRIMARY KEY,
                Descricao VARCHAR(200) NOT NULL
            )';
            $conn->exec($sql);

            $stmt = $conn->prepare("INSERT INTO Atividades (Numero, Descricao) VALUES (:numero, :descricao)");
            $stmt->bindParam(':numero', $_POST['item']);
            $stmt->bindParam(':descricao', $_POST['descricao']);
            $stmt->execute();

            echo '<script> alert("Dados Cadastrados com Sucesso!")</script>';
            echo '<script> location = "../../index.php";</script>';

          } catch(PDOException $e) {
            echo $sql . '<br>' . $e->getMessage();
          }
      
          $conn = null;
    }else{
        echo '<script> alert("Preencha todos os campos.")</script>';
    }
    

	
?>