<?php
    //require('check.php');
?>
<?php
    $nome = '';
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
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cadastrar</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body class="teal darken-4">
        <div class="container">
            <div class="card blue-grey darken-1">
                <form method="post" action="bd/bd_nome.php">
                    <div class="card-content white-text">
                        <span class="card-title"><h4>Cadastro de Beneficiário</h4></span>
                        <div class="divider"></div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <label for="nome">Nome Completo:</label>
                                <input type="text" class="form-control" value="<?=$nome?>"id="nome" name="nome">
                            </div>
                            <div class="input-field col s6 m4">
                                <label for="cpf">CPF:</label>
                                <input type="text" class="form-control" value="<?=$cpf?>" placeholder="XXXXXXXXX-XX" id="cpf" name="cpf">
                            </div>
                            <div class="input-field col s6 m2">
                                <label for="rg">RG:</label>
                                <input type="text" class="form-control" value="<?=$rg?>" id="rg" name="rg">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m2">
                                <label for="uf">UF:</label>
                                <input type="text" class="form-control" value="<?=$uf?>"id="uf" name="uf">
                            </div>
                            <div class="input-field col s12 m6">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" value="<?=$email?>" id="email" name="email">
                            </div>
                            <div class="input-field col s4 m4">
                                <label for="fone">Telefone:</label>
                                <input type="text" class="form-control" value="<?=$fone?>" placeholder="(XX) XXXXX-XXXX" id="fone" name="fone">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <label for="funcao">Função:</label>
                                <input type="text" class="form-control" value="<?=$funcao?>" id="funcao" name="funcao">
                            </div>
                            <div class="input-field col s12 m3">
                                <label for="contrato">Número do Contrato:</label>
                                <input type="text" class="form-control" value="<?=$contrato?>" id="contrato" name="contrato">
                            </div>
                            <div class="input-field col s12 m3">
                                <label for="proc">Número do Proc:</label>
                                <input type="text" class="form-control" value="<?=$proc?>" id="proc" name="proc">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m4">
                                <label for="modalidade">Modalidade:</label>
                                <input type="text" class="form-control" value="<?=$modalidade?>" id="modalidade" name="modalidade">
                            </div>
                            <div class="input-field col s12 m4">
                                <label for="periodoTotal">Periodo Total de Atividade:</label>
                                <input type="text" class="form-control" value="<?=$periodoTotal?>" placeholder="XX/XX/XXXX a XX/XX/XXXX" id="periodoTotal" name="periodoTotal">
                            </div>
                            <div class="input-field col s12 m4">
                                <label for="cargaTotal">Carga Horária Total:</label>
                                <input type="text" class="form-control" value="<?=$cargaTotal?>" id="cargaTotal" name="cargaTotal">
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn" id="btn">Cadastrar</button>
                    </div>
                </form> 
            </div>
        </div>
    </body>
</html>