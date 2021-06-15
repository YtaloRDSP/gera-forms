<?php
    include("credenciais.php");
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT Numero, Descricao, Subitem FROM Subatividades ORDER BY Numero, Subitem");
        $stmt->execute();
        $result = $stmt->fetchAll();
        echo "<script>var ltemp_sub = JSON.parse('".json_encode($result)."')</script>";

    } catch(PDOException $e) {
        echo $stmt . '<br>' . $e->getMessage();
    }
    $conn = null;
?>
