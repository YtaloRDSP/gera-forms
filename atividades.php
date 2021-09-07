<!DOCTYPE html>
<?php
    require('assets/autentic/verifica.php');
?>
<html>
    <script>
        var inicio = "<?=$_POST['inicio']?>"
        var fim = "<?=$_POST['fim']?>"
        var atividades = "<?=$_POST['meta']?>"
        var carga = "<?=$_POST['ch']?>"

        var nome = "<?=$_POST['nome']?>"
        var parcela = "<?=$_POST['parcela']?>"
    </script>

    <?php
        include("assets/bd/credenciais.php");
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM Beneficiarios WHERE Nome='".$_POST['nome']."'");
            $stmt->execute();
            $result = $stmt->fetch();
            echo "<script>var pack = JSON.parse('".json_encode($result)."')</script>";      
        } catch(PDOException $e) {
            echo $stmt . '<br>' . $e->getMessage();
        }
        $conn = null;
    ?>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Tabela</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
        <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/docxtemplater/3.21.1/docxtemplater.js"></script>
        <script src="https://unpkg.com/pizzip@3.0.6/dist/pizzip.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.8/FileSaver.js"></script>
        <script src="https://unpkg.com/pizzip@3.0.6/dist/pizzip-utils.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
                crossorigin="anonymous"></script>
        
    </head>

    <body class="align-content-center" style="background: #162D70;" onload="inicializar()">
        <div class="container align-content-center">
            <div class="card" style="background: rgba(255,255,255,0);border-color: rgba(33,37,41,0);">
                <div class="card-body" style="border-radius: 15px;background: #7997F2;border-color: var(--bs-blue);margin-top: 25px;">
                    <h4 class="card-title" style="font-size: 28px;text-align: left;">Tabela de Atividades</h4>
                    <h4 class="card-title" style="font-size: 16px;text-align: left;color: var(--bs-white);" id="nome"><?= $_POST['nome']?></h4>
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class='col-2'>Data</th>
                                    <th class='col-1'>Atividade</th>
                                    <th class='col-6'>Descrição</th>
                                    <th class='col-2'>CH</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="tabela">
                                
                            </tbody>
                        </table>
                    </div>
                        <a class="btn btn-primary text-end d-flex float-end d-lg-flex justify-content-center align-items-center justify-content-lg-center align-items-lg-center" role="button" onclick="geraDoc()"  data-bs-toggle="tooltip" data-bss-tooltip="" style="margin-left: 0px;height: 40px;text-align: left;margin-right: 0px;background: #264BBD;"
                    title="Gerar Arquivo .docx"><i class="fas fa-file-download" style="font-size: 30px;"></i></a>
                    <a class="btn btn-primary text-end d-flex float-start d-lg-flex justify-content-center align-items-center justify-content-lg-center align-items-lg-center"
                    role="button" data-bs-toggle="tooltip" data-bss-tooltip="" style="margin-left: 0px;height: 40px;text-align: left;margin-right: 0px;background: #264BBD;" title="Adicionar Atividade na Tabela" onclick="adiciona()"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="font-size: 30px;text-align: center;">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4Z" fill="currentColor"></path>
    <path fill-rule="evenodd" clip-rule="evenodd" d="M13 7C13 6.44772 12.5523 6 12 6C11.4477 6 11 6.44772 11 7V11H7C6.44772 11 6 11.4477 6 12C6 12.5523 6.44772 13 7 13H11V17C11 17.5523 11.4477 18 12 18C12.5523 18 13 17.5523 13 17V13H17C17.5523 13 18 12.5523 18 12C18 11.4477 17.5523 11 17 11H13V7Z" fill="currentColor"></path>
    </svg></a> 
            </div>
        </div>
        </div>
        <script src="assets/js/atividades.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/script.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
  
        
    </body>

</html>