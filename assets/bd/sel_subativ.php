<?php
    include("credenciais.php");
    try {
        echo "<option selected disabled>Escolha as subatividades realizadas no mês</option>";
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT Numero, Descricao FROM Atividades ORDER BY Numero");
        $stmt->execute();
        $result = $stmt->fetchAll();
        if($result){
            foreach($result as $linha){
                echo "<optgroup label='".$linha["Numero"]." - ".$linha["Descricao"]."'>";
                $stmt = $conn->prepare("SELECT Descricao, Subitem FROM Subatividades WHERE Numero='".$linha["Numero"]."' ORDER BY Subitem");
                $stmt->execute();
                $subAtiv = $stmt->fetchAll();
                if($subAtiv){
                    foreach($subAtiv as $item){
                        echo "<option value='".$linha["Numero"]."-".$item["Subitem"]."'>".$item["Subitem"]." - ".$item["Descricao"]."</option>";
                    }
                }
                echo "</optgroup>";                
            }
        }                
    } catch(PDOException $e) {
        echo $stmt . '<br>' . $e->getMessage();
    }
    $conn = null;
?>
