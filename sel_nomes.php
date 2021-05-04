<?php
    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

    $servername = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $database = 'heroku_1d16e51af604e58';
    try {
        echo "<option value='' disabled selected>Escolha um beneficiário</option>";
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT Nome FROM Beneficiarios");
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
