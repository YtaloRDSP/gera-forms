<?php
    require('check.php');
?>
<?php
    $nome = '';
    $meta = '';
    $parcela = '';
    $periodoMensal = '';
    $cargaMensal = '';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Gerador de Formulários</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <script>
        function enviar(){
            nome = document.getElementById("nome").value
            meta = document.getElementById("meta").value
            parcela = document.getElementById("parcela").value
            periodoMensal = document.getElementById("periodoMensal").value
            cargaMensal = document.getElementById("cargaMensal").value
            if(nome!='' && meta!='' && parcela!='' && periodoMensal!='' && cargaMensal!=''){
                document.getElementById("form").submit()
            } else{
                alert("Preencha todos os itens!")
            }
        }
    </script>
    <body class="teal darken-4">
        <div class="container">
            <div class="card blue-grey darken-1">
                <form action="atividades.php" method="post" id="form">
                    <div class="card-content white-text">
                        <span class="card-title"><h4>Gerador de Formulários</h4></span>
                        <div class="divider"></div>
                        <h5>Beneficiário</h5>
                        <div class="row">
                            <div class="input-field col s12">
                                <select class="browser-default" value="<?=$nome?>" id="nome" name="nome">
                                    <?php include("sel_nomes.php"); ?>
                                </select>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <h5>Plano de Trabalho</h5>
                        <div class="row">
                            <div class="input-field col s12">
                                <label for="meta">Meta:</label>
                                <input type="text" class="form-control" value="<?=$meta?>" id="meta" name="meta">
                            </div>
                        </div>
                        <div class='row'>
                            <div class="input-field col s12 m3">
                                <label for="parcela">Parcela:</label>
                                <input type="text" class="form-control" value="<?=$parcela?>" id="parcela" name="parcela">
                            </div>
                            <div class="input-field col s12 m6">
                                <label for="periodoMensal">Periodo Mensal:</label>
                                <input type="text" class="form-control" value="<?=$periodoMensal?>" placeholder="Ex: XX/XX/XXXX a XX/XX/XXXX" id="periodoMensal" name="periodoMensal">
                            </div>
                            <div class="input-field col s12 m3">
                                <label for="cargaMensal">Carga Mensal:</label>
                                <input type="text" class="form-control" value="<?=$cargaMensal?>" id="cargaMensal" name="cargaMensal">
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <a class="waves-effect waves-dark btn" href='cadastro.php'><i class="material-icons">add</i> Adicionar Beneficiário</a>
                        <a class="waves-effect waves-dark btn" onclick="enviar()"><i class="material-icons">arrow_forward_ios</i></a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>