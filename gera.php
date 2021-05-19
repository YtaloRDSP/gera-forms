<html>
    <?php
        session_start();
        if(isset($_POST['nome']) && isset($_POST['meta']) && isset($_POST['parcela']) && isset($_POST['periodoMensal']) && isset($_POST['cargaMensal'])){
            $nome = $_POST['nome'];
            $meta = $_POST['meta'];
            $parcela = $_POST['parcela'];
            $periodoMensal = $_POST['periodoMensal'];
            $cargaMensal = (int)$_POST['cargaMensal'];
        } else{
            echo '<script> location = "index.php";</script>';
        }

        $cpf = '';
        $rg = '';
        $uf = '';
        $email = '';
        $fone = '';
        $funcao = '';
        $contrato = '';
        $proc = '';
        $modalidade = '';
        $periodoTotal = '';
        $cargaTotal = '';

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

        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

        $servername = $url["host"];
        $username = $url["user"];
        $password = $url["pass"];
        $database = 'heroku_1d16e51af604e58';

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT CPF, RG, UF, Email, Fone, Funcao, Contrato, Procur, Modalidade, PeriodoTotal, CargaTotal FROM Beneficiarios WHERE Nome='".$nome."'");
            $stmt->execute();
            $result = $stmt->fetch();
            if($result){
                $cpf = $result["CPF"];
                $rg = $result["RG"];
                $uf = $result["UF"];
                $email = $result["Email"];
                $fone = $result["Fone"];
                $funcao = $result["Funcao"];
                $contrato = $result["Contrato"];
                $proc = $result["Procur"];
                $modalidade = $result["Modalidade"];
                $periodoTotal = $result["PeriodoTotal"];
                $cargaTotal = (int)$result["CargaTotal"];
            }
            
            $i=1;
            $j=[];
            $tabela = [];
            $totalI = [];
            $totalPorc = [];
            for($i=1; $i<=10; $i++){
                $stmt = $conn->prepare("SELECT Dias, Codigo, Atividade, CH FROM Atividades  WHERE Categoria = $i ORDER BY Codigo");
                $stmt->execute();
                $result = $stmt->fetchAll();
                if($result){
                    $s=0;
                    for($s=0; $s<count($result); $s++){
                        $result[$s]["Codigo"] = $i.".".$result[$s]["Codigo"];
                        $result[$s]["CH"] = $result[$s]["CH"]."h|".number_format((((int)$result[$s]["CH"]/$cargaMensal)*100), 2)."%";
                    }
                    foreach($result as $linha){
                        $totalI[$i] += (int)$linha["CH"];
                    }
                    $totalPorc[$i]=number_format(($totalI[$i]/$cargaMensal)*100,2);
                    $j[] = $i;
                    $tabela[] = json_encode($result);
                }
            }
        } catch(PDOException $e) {
            echo $stmt . '<br>' . $e->getMessage();
        }
        $conn = null;
    ?>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/docxtemplater/3.21.1/docxtemplater.js"></script>
    <script src="https://unpkg.com/pizzip@3.0.6/dist/pizzip.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.8/FileSaver.js"></script>
    <script src="https://unpkg.com/pizzip@3.0.6/dist/pizzip-utils.js"></script>
    <!--
    Mandatory in IE 6, 7, 8 and 9.
    -->
    <!--[if IE]>
        <script type="text/javascript" src="https://unpkg.com/pizzip@3.0.6/dist/pizzip-utils-ie.js"></script>
    <![endif]-->
    <script>
        function loadFile(url,callback){
            PizZipUtils.getBinaryContent(url,callback);
        }
        tamanho = "<?php echo count($j);?>"
        coor = "<?php if($nome=='Lizandro Manzato') echo 'Coor';
            else echo ''?>"
        arquivo = "word/rel"+coor+tamanho+".docx"
        now = new Date
        meses = ['01','02','03','04','05','06','07','08','09','10','11','12']
        <?php
            for($i=count($j); $i<=10; $i++){
                $j[]='1';
                $tabela[] = $tabela[0];
            }
        ?>
        loadFile(arquivo,function(error,content){
            if (error) { throw error };

            // The error object contains additional information when logged with JSON.stringify (it contains a properties object containing all suberrors).
            function replaceErrors(key, value) {
                if (value instanceof Error) {
                    return Object.getOwnPropertyNames(value).reduce(function(error, key) {
                        error[key] = value[key];
                        return error;
                    }, {});
                }
                return value;
            }

            function errorHandler(error) {
                console.log(JSON.stringify({error: error}, replaceErrors));

                if (error.properties && error.properties.errors instanceof Array) {
                    const errorMessages = error.properties.errors.map(function (error) {
                        return error.properties.explanation;
                    }).join("\n");
                    console.log('errorMessages', errorMessages);
                    // errorMessages is a humanly readable message looking like this :
                    // 'The tag beginning with "foobar" is unopened'
                }
                throw error;
            }

            var zip = new PizZip(content);
            var doc;
            try {
                doc=new window.docxtemplater(zip);
            } catch(error) {
                // Catch compilation errors (errors caused by the compilation of the template : misplaced tags)
                errorHandler(error);
            }

            doc.setData({
                nome: "<?php echo $nome; ?>",
                cpf: "<?php echo $cpf; ?>",
                rg: "<?php echo $rg; ?>",
                uf: "<?php echo $uf; ?>",
                email: "<?php echo $email; ?>",
                fone: "<?php echo $fone; ?>",
                funcao: "<?php echo $funcao; ?>",
                contrato: "<?php echo $contrato; ?>",
                proc: "<?php echo $proc; ?>",
                modalidade: "<?php echo $modalidade; ?>",
                periodoTotal: "<?php echo $periodoTotal; ?>",
                cargaTotal: "<?php echo $cargaTotal; ?>",
                meta: "<?php echo $meta; ?>",
                parcela: "<?php echo $parcela; ?>",
                periodoMensal: "<?php echo $periodoMensal; ?>",
                cargaMensal: "<?php echo $cargaMensal; ?>",
                mes: meses[now.getMonth()],
                ind1: "<?php echo $j[0];?>",
                ativ1: "<?php echo $categorias[$j[0]];?>",
                totalCH1: "<?php echo (string)$totalI[$j[0]]."h|".(string)$totalPorc[$j[0]]."%";?>",
                at1: <?php echo $tabela[0];?>,
                ind2: "<?php echo $j[1];?>",
                ativ2: "<?php echo $categorias[$j[1]];?>",
                totalCH2: "<?php echo (string)$totalI[$j[1]]."h|".(string)$totalPorc[$j[1]]."%";?>",
                at2: <?php echo $tabela[1];?>,
                ind3: "<?php echo $j[2];?>",
                ativ3: "<?php echo $categorias[$j[2]];?>",
                totalCH3: "<?php echo (string)$totalI[$j[2]]."h|".(string)$totalPorc[$j[2]]."%";?>",
                at3: <?php echo $tabela[2];?>,
                ind4: "<?php echo $j[3];?>",
                ativ4: "<?php echo $categorias[$j[3]];?>",
                totalCH4: "<?php echo (string)$totalI[$j[3]]."h|".(string)$totalPorc[$j[3]]."%";?>",
                at4: <?php echo $tabela[3];?>,
                ind5: "<?php echo $j[4];?>",
                ativ5: "<?php echo $categorias[$j[4]];?>",
                totalCH5: "<?php echo (string)$totalI[$j[4]]."h|".(string)$totalPorc[$j[4]]."%";?>",
                at5: <?php echo $tabela[4];?>
                });
            try {
                // render the document (replace all occurences of {first_name} by John, {last_name} by Doe, ...)
                doc.render();
            }
            catch (error) {
                // Catch rendering errors (errors relating to the rendering of the template : angularParser throws an error)
                errorHandler(error);
            }
            arqNome = "<?php echo $nome;?>-Mes "+meses[now.getMonth()]

            var out=doc.getZip().generate({
                type:"blob",
                mimeType: "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
            }) //Output the document using Data-URI
            saveAs(out,arqNome+".docx")
        })
    </script>
</html>