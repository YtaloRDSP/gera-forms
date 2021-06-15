<?php
    include("credenciais.php");
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT Numero, Descricao FROM Atividades ORDER BY Numero");
        $stmt->execute();
        $result = $stmt->fetchAll();
        echo "<script>var l_atv = JSON.parse('".json_encode($result)."')</script>";
    } catch(PDOException $e) {
        echo $stmt . '<br>' . $e->getMessage();
    }
    //echo "<script>inicializar()</script>";
    $conn = null;
?>
