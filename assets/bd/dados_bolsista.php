<?php
    include("credenciais.php");
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM Beneficiarios WHERE Nome='".$_GET['nome']."'");
        $stmt->execute();
        $result = $stmt->fetch();
        echo json_encode($result);             
    } catch(PDOException $e) {
        echo $stmt . '<br>' . $e->getMessage();
    }
    $conn = null;
?>
