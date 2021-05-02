<?php
    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

    $servername = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $database = 'heroku_1d16e51af604e58';

    $categorias = array(
        1 => "Reunião Inicial(Kickoff)",
        2 => "Mapeamento do Processo, Identificação e Descrição das Variáveis relacionadas com o Processo",
        3 => "Definição do Banco de Dados",
        4 => "Recebimento de Dados e Preparo do Servidor - MS Azure",
        5 => "Análise Preliminar dos Dados",
        6 => "Modelagem do Processo",
        7 => "Validação do Sistema de CEP",
        8 => "Implantação do Sistema de CEP",
        9 => "Acompanhamento e Manutenção",
        10 => "Treinamento Six Sigma"
    );
    $data = $_GET['data'];
    $codigo = (int)$_GET['codigo'];
    $atividade = $_GET['atividade'];
    $CH = (int)$_GET['ch'];
    $categoria = (int)$_GET['categoria'];
    $cargaTotal = (int)$_GET['ct'];

    echo "  <table>
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Atividade</th>
                    <th>Descrição da Atividade</th>
                    <th>CH</th>
                </tr>
            </thead>
            <tbody>";

    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'sixsigma';

    try {
        $conn = new PDO("mysql:host=$servername", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE IF NOT EXISTS $database;";
        $conn->exec($sql);
        $conn = null;
    
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'CREATE TABLE IF NOT EXISTS Atividades (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            Categoria int(2) NOT NULL,
            Dias VARCHAR(200) NOT NULL,
            Codigo int(4) NOT NULL,
            Atividade VARCHAR(150) NOT NULL,
            CH VARCHAR(20) NOT NULL
        )';

        $conn->exec($sql);

        if(!($data == '') && !($codigo == '') && !($atividade == '') && !($CH == '')){
            $stmt = $conn->prepare("INSERT INTO Atividades (Categoria, Dias, Codigo, Atividade, CH)
                                VALUES (:categoria, :dias, :codigo, :atividade, :ch)");
            $stmt->bindParam(':categoria', $categoria);
            $stmt->bindParam(':dias', $data);
            $stmt->bindParam(':codigo', $codigo);
            $stmt->bindParam(':atividade', $atividade);
            $stmt->bindParam(':ch', $CH);
            $stmt->execute();
        }
        
        $i = 1;
        $totalPorc = [];
        
        for($i = 1; $i<=10; $i++){
            $totalPorc[$i] = 0;
            $stmt = $conn->prepare("SELECT Dias, Codigo, Atividade, CH FROM Atividades WHERE Categoria = $i ORDER BY Codigo");
            $stmt->execute();

            $result = $stmt->fetchAll();

            if($result){
                $totalPorc[$i] = 0;
                echo "<tr class='grey'>
                    	<td> </td>
                        <td>".$i."</td>
                        <td>".$categorias[$i]."</td>";
                foreach($result as $linha){
                    $totalPorc[$i] += (int)$linha["CH"];
                }
                echo "<td>".$totalPorc[$i]."h|".number_format((($totalPorc[$i]/$cargaTotal)*100),2)."%</td></tr>";         
                foreach($result as $linha){
                    echo "<tr>
                        <td>".str_replace(" ","<br>", $linha["Dias"])."</td>
                        <td>".$i.".".$linha["Codigo"]."</td>
                        <td>".$linha["Atividade"]."</td>
                        <td>".$linha["CH"]."h|".number_format((((int)$linha["CH"]/$cargaTotal)*100),2)."%</td>
                    </tr>";
                }
            }
        } 
        echo "<tr class='blue-grey darken-2'><td></td><td></td><td>TOTAL</td><td>".array_sum($totalPorc)."h|".number_format(((array_sum($totalPorc)/$cargaTotal)*100), 2)."%</td></tbody></table>";
    } catch(PDOException $e) {
        echo $stmt . '<br>' . $e->getMessage();
    }
    $conn = null;
?>