<!DOCTYPE html>
<html>
    <head>
        <title>Gerador de Formulários</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="//code.jquery.com/jquery-2.1.4.js"></script><style type="text/css"></style>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">    
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <script>
            var categorias = [
                "Reunião Inicial(Kickoff)",
                "Mapeamento do Processo, Identificação e Descrição das Variáveis relacionadas com o Processo",
                "Definição do Banco de Dados",
                "Recebimento de Dados e Preparo do Servidor - MS Azure",
                "Análise Preliminar dos Dados",
                "Modelagem do Processo",
                "Validação do Sistema de CEP",
                "Implantação do Sistema de CEP",
                "Acompanhamento e Manutenção",
                "Treinamento Six Sigma"
            ]
            window.onload=function(){
                $(document).ready(function() {
                    $('#sel').material_select();
                    $('#nome').material_select();
                });
            }
            function show(){
                v = $('#sel').val()
                frase = ''
                console.log(v)
                console.log(categorias[0])
                for (i = 0; i < v.length; i++) {
                    frase += categorias[Number(v[i])-1]
                    if (i != v.length -1) {
                        frase += '/'
                    }
                }
                document.getElementById('meta').value = frase
            }
        </script>
    </head>
    
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
                                <select id="nome" name="nome" required>
                                    <?php include("bd/sel_nomes.php"); ?>
                                </select>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <h5>Plano de Trabalho</h5>
                        <div class="row">
                            <div class="input-field col s12">
                                <select multiple id="sel" name="sel" required>
                                    <option value="1">1 -Reunião Inicial(Kickoff)</option>
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
                        </div>
                        <div class='row'>
                            <div class="input-field col s12 m3">
                                <label for="parcela">Parcela:</label>
                                <input type="text" class="form-control" id="parcela" name="parcela" required>
                            </div>
                            <div class="input-field col s12 m6">
                                <label for="periodoMensal">Periodo Mensal:</label>
                                <input type="text" class="form-control" placeholder="Ex: XX/XX/XXXX a XX/XX/XXXX" id="periodoMensal" name="periodoMensal" required>
                            </div>
                            <div class="input-field col s12 m3">
                                <label for="cargaMensal">Carga Mensal:</label>
                                <input type="text" class="form-control" id="cargaMensal" name="cargaMensal" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="meta" name="meta">
                        </div>
                    </div>
                    <div class="card-action">
                        <a class="waves-effect waves-dark btn" href='cadastro.php'><i class="material-icons">add</i> Adicionar Beneficiário</a>
                        <button class="waves-effect waves-dark btn" type="submit" onclick="show()"><i class="material-icons">arrow_forward_ios</i></button>
                    </div>
                </form>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#parcela').mask('00')
                $('#periodoMensal').mask('00/00/0000 a 00/00/0000')
                $('#cargaMensal').mask('000')
            });
        </script>
    </body>
</html>