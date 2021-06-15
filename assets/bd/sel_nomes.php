<?php
    include("credenciais.php");
    try {
        echo "<option selected disabled>Escolha um beneficiário</option>";
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT Nome FROM Beneficiarios ORDER BY Nome");
        $stmt->execute();
        $result = $stmt->fetchAll();
        if($result){
            foreach($result as $linha){
                echo "<option>".$linha["Nome"]."</option>";
            }
        }                
    } catch(PDOException $e) {
        echo $stmt . '<br>' . $e->getMessage();
    }
    $conn = null;
?>
