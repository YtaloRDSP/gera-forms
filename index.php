<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-16">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <script type="text/javascript" src="//code.jquery.com/jquery-2.1.4.js"></script>
        <title>Gerador de Formulários</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
        <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
        <link rel="stylesheet" href="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.css">
        <script src="assets/js/index.js"></script>
    </head>
    <body class="align-content-center" style="background: #162D70;">
        <div class="container align-content-center" style="max-width: 500px;">
            <div class="card" style="max-width: 500px;background: rgba(255,255,255,0);border-color: rgba(33,37,41,0);">
                <div class="card-body" style="border-radius: 15px;background: #7997F2;border-color: var(--bs-blue);margin-top: 25px;">
                    <h4 class="card-title" style="font-size: 28px;text-align: left;">Gerador de Formulários</h4>
                    <h4 class="card-title" style="font-size: 20px;text-align: left;color: var(--bs-white);">Beneficiário</h4>
                    <form action="atividades.php" method="post" name="form" id="form">
                        <div class="input-group" style="margin-top: 15px;margin-right: 0px;margin-bottom: 15px;"><span class="input-group-text" style="background: #384670;color: var(--bs-white);">Beneficiário</span><select class="form-select" name="nome" id="nome"><?php include("assets/bd/sel_nomes.php"); ?></select>
                            <a
                                class="btn btn-primary d-flex d-lg-flex justify-content-center align-items-center justify-content-lg-center align-items-lg-center" data-bs-toggle="tooltip" data-bss-tooltip="" type="button" style="background: #264BBD;" title="Adicionar Beneficiário" href='cadastro.php'><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="font-size: 20px;text-align: center;">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4Z" fill="currentColor"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13 7C13 6.44772 12.5523 6 12 6C11.4477 6 11 6.44772 11 7V11H7C6.44772 11 6 11.4477 6 12C6 12.5523 6.44772 13 7 13H11V17C11 17.5523 11.4477 18 12 18C12.5523 18 13 17.5523 13 17V13H17C17.5523 13 18 12.5523 18 12C18 11.4477 17.5523 11 17 11H13V7Z" fill="currentColor"></path>
                            </svg></a>
                        </div>
                        <h4 style="font-size: 20px;text-align: left;color: var(--bs-white);">Plano de Trabalho</h4>
                        <div class="row" style="border-style: none;border-color: rgba(33,37,41,0);">
                            <div class="col" style="border-style: none;border-color: rgba(33,37,41,0);"><span class="float-start" style="width: 100px;background: #384670;color: var(--bs-white);padding: 10px;border-radius: 5px;">Atividades</span></div>
                        </div>
                        <table class="table" id="at_selecionadas"></table>
                        <div class="input-group" style="margin-top: 15px;margin-right: 0px;margin-bottom: 15px;">
                            <select placeholder="Insira as atividades realizadas" name="atividades" id="atividades" multiple="multiple">
                                <option value="1">1 - Reunião Inicial(Kickoff)</option>
                                <option value="2">2 - Mapeamento do Processo, Identificação e Descrição das Variáveis relacionadas com o Processo</option>
                                <option value="3">3 - Definição do Banco de Dados</option>
                                <option value="4">4 - Recebimento de Dados e Preparo do Servidor - MS Azure</option>
                                <option value="5">5 - Análise Preliminar dos Dados</option>
                                <option value="6">6 - Modelagem do Processo</option>
                                <option value="7">7 - Validação do Sistema de CEP</option>
                                <option value="8">8 - Implantação do Sistema de CEP</option>
                                <option value="9">9 - Acompanhamento e Manutenção</option>
                                <option value="10">10 - Treinamento Six Sigma</option>
                            </select>
                        </div>
                        <div
                            class="input-group" style="margin-top: 15px;margin-bottom: 15px;"><span class="input-group-text" style="width: 75;background: #384670;color: var(--bs-white);">Parcela</span><input class="form-control" type="text" name="parcela" id="parcela"><span class="input-group-text" style="background: #384670;color: var(--bs-white);">Carga Horária</span>
                            <input
                                class="form-control" type="text" name="ch" id="ch"></div>
                <div class="input-group" style="margin-top: 15px;margin-right: 0px;margin-bottom: 15px;"><span class="input-group-text" style="width: 146px;background: #384670;color: var(--bs-white);">Inicio do Periodo</span><input class="form-control" type="date" name="inicio" id="inicio"></div>
                <div class="input-group" style="margin-top: 15px;margin-right: 0px;margin-bottom: 15px;"><span class="input-group-text" style="width: 146px;background: #384670;color: var(--bs-white);">Fim do Periodo</span><input class="form-control" type="date" name="fim" id="fim"></div>
                <input type="hidden" class="form-control" id="meta" name="meta" required>
                <button class="btn btn-primary text-end d-flex float-end d-lg-flex justify-content-center align-items-center justify-content-lg-center align-items-lg-center"
                    onclick="validar()" type="button" style="margin-left: 0px;height: 40px;text-align: left;margin-right: 0px;background: #264BBD;"><i class="material-icons" style="background: #264BBD;">navigate_next</i></button></form>
            </div>
        </div>
        </div>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/script.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
        <script src="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#parcela').mask('00')
                $('#ch').mask('000')
                $('#atividades').multipleSelect()
            });
        </script>
    </body>
</html>