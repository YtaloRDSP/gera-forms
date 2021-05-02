<?php

    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

    $servername = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $database = 'heroku_1d16e51af604e58';
    session_start();

    if(!($_POST['nome']=='') && !($_POST['cpf']=='') && !($_POST['rg']=='') && !($_POST['uf']=='') && !($_POST['email']=='') && !($_POST['fone']=='') && !($_POST['funcao']=='') && !($_POST['proc']=='') && !($_POST['modalidade']=='') && !($_POST['periodoTotal']=='') && !($_POST['cargaTotal']=='')){
        try {
            $conn = new PDO("mysql:host=$servername", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CREATE DATABASE IF NOT EXISTS $database;";
            $conn->exec($sql);
            $conn = null;

            $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = 'CREATE TABLE IF NOT EXISTS Beneficiarios (
                Nome VARCHAR(100) NOT NULL,
                CPF VARCHAR(14) NOT NULL PRIMARY KEY,
                RG VARCHAR(15) NOT NULL,
                UF VARCHAR(2) NOT NULL,
                Email VARCHAR(100) NOT NULL,
                Fone VARCHAR(20) NOT NULL,
                Funcao VARCHAR(100) NOT NULL,
                Procur VARCHAR(50) NOT NULL,
                Modalidade VARCHAR(100) NOT NULL,
                PeriodoTotal VARCHAR(50) NOT NULL,
                CargaTotal VARCHAR(5) NOT NULL
            )';
            $conn->exec($sql);

            $stmt = $conn->prepare("INSERT INTO Beneficiarios (Nome, CPF, RG, UF, Email, Fone, Funcao, Procur, Modalidade, PeriodoTotal, CargaTotal)
                                                VALUES (:nome, :cpf, :rg, :uf, :email, :fone, :funcao, :procur, :modalidade, :periodototal, :cargatotal)");
            $stmt->bindParam(':nome', $_POST['nome']);
            $stmt->bindParam(':cpf', $_POST['cpf']);
            $stmt->bindParam(':rg', $_POST['rg']);
            $stmt->bindParam(':uf', $_POST['uf']);
            $stmt->bindParam(':email', $_POST['email']);
            $stmt->bindParam(':fone', $_POST['fone']);
            $stmt->bindParam(':funcao', $_POST['funcao']);
            $stmt->bindParam(':procur', $_POST['proc']);
            $stmt->bindParam(':modalidade', $_POST['modalidade']);
            $stmt->bindParam(':periodototal', $_POST['periodoTotal']);
            $stmt->bindParam(':cargatotal', $_POST['cargaTotal']);
            $stmt->execute();

            echo '<script> alert("Dados Cadastrados com Sucesso!")</script>';
            echo '<script> location = "index.php";</script>';

          } catch(PDOException $e) {
            echo $sql . '<br>' . $e->getMessage();
          }
      
          $conn = null;
    }else{
        echo '<script> alert("Preencha todos os campos.")</script>';
        echo '<script> location = "cadastro.php";</script>';
    }
    

	
?>