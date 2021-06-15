<?php

    include("credenciais.php");
    session_start();

    if(!($_POST['subitem']=='') && !($_POST['descricao']=='')){
        try {
            $conn = new PDO("mysql:host=$servername", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CREATE DATABASE IF NOT EXISTS $database;";
            $conn->exec($sql);
            $conn = null;

            $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = 'CREATE TABLE IF NOT EXISTS Subatividades (
                Numero INT(2),
                Descricao VARCHAR(200) NOT NULL,
                Subitem VARCHAR(2) NOT NULL,
                FOREIGN KEY (Numero) REFERENCES Atividades(Numero)
            )';
            $conn->exec($sql);

            $stmt = $conn->prepare("INSERT INTO Subatividades (Numero, Descricao, Subitem) VALUES (:numero, :descricao, :subitem)");
            $stmt->bindParam(':numero', explode('-', $_POST['subitem'])[0]);
            $stmt->bindParam(':descricao', $_POST['descricao']);
            $stmt->bindParam(':subitem', explode('-', $_POST['subitem'])[1]);
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