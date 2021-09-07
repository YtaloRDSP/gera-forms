<!DOCTYPE html>
<?php
    require('assets/autentic/verifica.php');
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Cadastrar</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
        <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
    </head>

    <body class="align-content-center" style="background: #162D70;">
        <div class="container align-content-center" style="max-width: 500px;">
            <div class="card" style="max-width: 500px;background: rgba(255,255,255,0);border-color: rgba(33,37,41,0);">
                <div class="card-body"
                    style="border-radius: 15px;background: #7997F2;border-color: var(--bs-blue);margin-top: 25px;">
                    <h4 class="card-title" style="font-size: 28px;text-align: left;">Cadastro de Beneficiário</h4>
                    <form action="assets/bd/bd_nome.php" method="post" id="dados">
                        <div class="input-group" style="margin-top: 15px;margin-right: 0px;margin-bottom: 15px;">
                            <span class="input-group-text" style="background: #384670;color: var(--bs-white);">Nome Completo</span>
                            <input class="form-control" type="text" id="nome" name="nome">
                        </div>
                        <div class="input-group" style="margin-top: 15px;margin-right: 0px;margin-bottom: 15px;">
                            <span class="input-group-text" style="background: #384670;color: var(--bs-white);">CPF</span>
                            <input class="form-control" type="text" id="cpf" name="cpf">
                            <span class="input-group-text" style="background: #384670;color: var(--bs-white);">RG</span>
                            <input class="form-control" type="text" id="rg" name="rg">
                        </div>
                        <div class="input-group" style="margin-top: 15px;margin-right: 0px;margin-bottom: 15px;">
                            <span class="input-group-text" style="background: #384670;color: var(--bs-white);">Email</span>
                            <input class="form-control" type="text" id="email" name="email">
                        </div>
                        <div class="input-group" style="margin-top: 15px;margin-right: 0px;margin-bottom: 15px;">
                            <span class="input-group-text" style="background: #384670;color: var(--bs-white);">UF</span>
                            <input class="form-control" type="text" id="uf" name="uf">
                            <span class="input-group-text" style="background: #384670;color: var(--bs-white);">Telefone</span>
                            <input class="form-control" type="text" id="fone" name="fone">
                        </div>
                        <div class="input-group" style="margin-top: 15px;margin-bottom: 15px;">
                            <span class="input-group-text" style="width: 75;background: #384670;color: var(--bs-white);">Função</span>
                            <input class="form-control" type="text" id="funcao" name="funcao">
                        </div>
                        <div class="input-group" style="margin-top: 15px;margin-bottom: 15px;">
                            <span class="input-group-text" style="width: 75;background: #384670;color: var(--bs-white);">Modalidade</span>
                            <input class="form-control" type="text" id="modalidade" name="modalidade">
                        </div>
                        <div class="input-group" style="margin-top: 15px;margin-bottom: 15px;">
                            <span class="input-group-text" style="width: 75;background: #384670;color: var(--bs-white);">Contrato</span>
                            <input class="form-control" type="text" id="contrato" name="contrato">
                            <span class="input-group-text" style="background: #384670;color: var(--bs-white);">Proc</span>
                            <input class="form-control" type="text" id="proc" name="proc">
                            <span class="input-group-text" style="background: #384670;color: var(--bs-white);">CH</span>
                            <input class="form-control" type="text" id="cargaTotal" name="cargaTotal">
                        </div>
                        <div class="input-group" style="margin-top: 15px;margin-right: 0px;margin-bottom: 15px;">
                            <span class="input-group-text" style="width: 146px;background: #384670;color: var(--bs-white);">Inicio do Periodo</span>
                            <input class="form-control" type="date" name="inicio" id="inicio">
                        </div>
                        <div class="input-group" style="margin-top: 15px;margin-right: 0px;margin-bottom: 15px;">
                            <span class="input-group-text" style="width: 146px;background: #384670;color: var(--bs-white);">Fim do Periodo</span>
                            <input class="form-control" type="date" name="fim" id="fim">
                        </div>
                        <div class="input-group sr-only">
                            <input class="form-control" type="text" name="periodoTotal" id="periodoTotal">
                        </div>
                        <button class="btn btn-primary text-end d-flex float-end d-lg-flex justify-content-center align-items-center justify-content-lg-center align-items-lg-center"
                            type="button" style="margin-left: 0px;height: 40px;text-align: left;margin-right: 0px;background: #264BBD;"
                            onclick="show()"><i class="material-icons" style="background: #264BBD;">navigate_next</i></button>
                    </form>
                </div>
            </div>
        </div>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/script.min.js"></script>
        <script>
            function show(){
                dtIn = document.getElementById('inicio').value
                dtIn = dtIn.split('-')[2] + '/' + dtIn.split('-')[1] + '/' + dtIn.split('-')[0]
                dtFim = document.getElementById('fim').value
                dtFim = dtFim.split('-')[2] + '/' + dtFim.split('-')[1] + '/' + dtFim.split('-')[0]

                document.getElementById('periodoTotal').value = dtIn + ' a ' + dtFim
                console.log(document.getElementById('periodoTotal').value)
                document.getElementById('dados').submit()
            }
        </script>
    </body>

</html>