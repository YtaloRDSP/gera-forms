<?php
    //require('check.php');
?>
<html>
    <?php
        session_start();
        if(isset($_POST['nome']) && isset($_POST['meta']) && isset($_POST['parcela']) && isset($_POST['periodoMensal']) && isset($_POST['cargaMensal'])){
            $nome = $_POST['nome'];
            $meta = $_POST['meta'];
            $parcela = $_POST['parcela'];
            $periodoMensal = $_POST['periodoMensal'];
            $cargaMensal = $_POST['cargaMensal'];
        } else{
            echo '<script> location = "index.php";</script>';
        }
    ?>
    <script>
        function enviar(){
            document.getElementById("form").submit()
        }
        function tabela(n){
            cargaTotal = Number("<?php echo $cargaMensal;?>")
            data = mostrar()
            console.log(data)
            atividade = document.getElementById("atividade").value
            ch = document.getElementById("ch").value

            if(n==0){data = ''}

            var pretabela = new XMLHttpRequest();
            pretabela.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    document.getElementById("tabela").innerHTML = this.responseText;
                }
            };
            pretabela.open("GET", "bd/tabela.php?data="+data+"&atividade="+atividade+"&ch="+ch+"&ct="+cargaTotal, true);
            pretabela.send();
        }
        function drop(){
            var cn = confirm("Tem certeza que deseja excluir TODA a tabela?")
            if(cn){
                var pretabela = new XMLHttpRequest();
                pretabela.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200){
                        document.getElementById("tabela").innerHTML = this.responseText;
                    }
                };
                pretabela.open("GET", "bd/drop.php", true);
                pretabela.send();
            }
        }
        function excluir(n){
            var cn = confirm("Tem certeza que deseja excluir este item da tabela?")
            if(cn){
                var exclusao = new XMLHttpRequest();
                exclusao.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200){
                        document.getElementById("exclusao").innerHTML = this.responseText;
                    }
                };
                exclusao.open("GET", "bd/excluir.php?id="+n, true);
                exclusao.send();
                tabela(0);
            }
        }
    </script>
    <head>
        <title>Gerador de Tabela</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/jquery.datepick.css" rel="stylesheet">
        <script type="text/javascript" src="//code.jquery.com/jquery-2.1.4.js"></script><style type="text/css"></style>
        <script src="js/jquery.plugin.min.js"></script>
        <script src="js/jquery.datepick.js"></script>
        <script>
            var datas
            $(function() {
                $('#getSetInlinePicker').datepick({
                    multiSelect: 15,
                    showTrigger: '#calImg',
                    onSelect: showDate
                });
            });

            function showDate(date) {
                datas = JSON.stringify(date)
                datas = JSON.parse(datas)
                for (i = 0; i < datas.length; i++) {
                    datas[i] = String(datas[i]).slice(0, 10)
                }
            }

            function mostrar() {
                if(!datas) ordenadas = []
                else ordenadas = datas
                for (i = 0; i < ordenadas.length; i++) {
                    ind = i
                    menor = ordenadas[i]
                    for (j = i; j < ordenadas.length; j++) {
                        minMes = Number(menor.slice(5, 7))
                        minDia = Number(menor.slice(8, 10))
                        cMes = Number(ordenadas[j].slice(5, 7))
                        cDia = Number(ordenadas[j].slice(8, 10))
                        if (cMes < minMes || (cMes == minMes && cDia < minDia)) {
                            menor = ordenadas[j]
                            ordenadas[j] = ordenadas[i]
                            ordenadas[i] = menor
                        }
                    }
                }
                saida = ''
                for (i = 0; i < ordenadas.length; i++) {
                    saida += ordenadas[i].slice(8, 10) + '/'
                    saida += ordenadas[i].slice(5, 7) + '/'
                    saida += ordenadas[i].slice(0, 4)
                    if (i != ordenadas.length - 1) saida += ' '
                }
                $('#getSetInlinePicker').datepick("destroy");
                $('#getSetInlinePicker').datepick({
                    multiSelect: 10,
                    showTrigger: '#calImg',
                    onSelect: showDate
                });
                return saida
            }
        </script>
    </head>

    <body onload="tabela(0)" class="teal darken-4">
        <div class="container">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title"><h4>Gerador de Tabelas</h4></span>
                    <div class="divider"></div>
                    <div class="row">
                        <div class='col'><h6><?php echo "Usuário: ".$nome;?></h6>
                    </div>
                    <div class="row">
                        <div id='tabela'></div>
                        <div id='exclusao'></div>
                    </div>
                    <div class="divider"></div>
                    <h5>Inserir Novo Item</h5>
                    <div class="row">
                        <form class="col">
                            
                            <div class="row">
                                <div class="input-field col s12 m6 l3">
                                    <div id="getSetInlinePicker"></div>
                                </div>
                                <div class="input-field col s12 m6 l7">
                                    <select class="browser-default" id='atividade'>
                                        <option value='' disabled selected>Escolha uma atividade</option>
                                        <optgroup label="1 - Reunião Inicial(Kickoff)">
                                        </optgroup>
                                        <optgroup label="2 - Mapeamento do Processo, Identificação e Descrição das Variáveis relacionadas com o Processo">
                                        </optgroup>
                                        <optgroup label="3 - Definição do Banco de Dados">
                                            <option value="3-1">1 - Definição do banco de dados espelho extraído do sistema corporativo</option>
                                            <option value="3-2">2 - Elaboração do protocolo de base de dados e de confidencialidade</option>
                                            <option value="3-3">3 - Recebimento dos dados</option>
                                            <option value="3-4">4 - Mapeamento, apreciação e norteamento de aquisição e demandas por dispêndio junto à Faepi</option>
                                            <option value="3-5">5 - Controle no fluxo de entrada e saída de correspondências</option>
                                            <option value="3-6">6 - Reunião semanal com a equipe de trabalho IFAM – Apresentar os objetivos, prazos e cronogramas</option>
                                            <option value="3-7">7 - Organização, preparação e arquivamento de documentos conforme procedimentos</option>
                                            <option value="3-8">8 - Visita na Empresa Arris para definição do processo de trabalho</option>
                                        </optgroup>
                                        <optgroup label="4 - Recebimento de Dados e Preparo do Servidor - MS Azure">
                                        </optgroup>
                                        <optgroup label="5 - Análise Preliminar dos Dados">
                                        </optgroup>
                                        <optgroup label="6 - Modelagem do Processo">
                                        </optgroup>
                                        <optgroup label="7 - Validação do Sistema de CEP">
                                        </optgroup>
                                        <optgroup label="8 - Implantação do Sistema de CEP">
                                        </optgroup>
                                        <optgroup label="9 - Acompanhamento e Manutenção">
                                        </optgroup>
                                        <optgroup label="10 - Treinamento Six Sigma">
                                            <option value="10-1">1 - Acompanhamento/monitoramento do software action no microsoft azure</option>
                                            <option value="10-2">2 - Mapeamento, apreciação e norteamento de aquisição e demandas por dispêndio junto à Faepi</option>
                                            <option value="10-3">3 - Controle no fluxo de entrada e saída de correspondências</option>
                                            <option value="10-4">4 - Reunião semanal com a equipe de trabalho IFAM – Apresentar os objetivos, prazos e cronogramas</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="input-field col s12 m4 l2">
                                    <label for="ch">Carga Horária:</label>
                                    <input type="text" class="form-control" id="ch">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col">
                            <a class="btn-floating waves-effect waves-dark" onclick="tabela()"><i class="material-icons">add</i></a>
                            <a class="btn-floating waves-effect waves-dark" onclick="drop()"><i class="material-icons">clear</i></a>
                            <a class="btn-floating waves-effect waves-dark" onclick="enviar()" id="btn"><i class="material-icons">download</i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form method="post" action="gera.php" id='form'>
            <div class="form-group">
                <input type="hidden" class="form-control" value="<?=$nome?>" id="nome" name="nome">
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" value="<?=$meta?>" id="meta" name="meta">
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" value="<?=$parcela?>" id="parcela" name="parcela">
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" value="<?=$periodoMensal?>" id="periodoMensal" name="periodoMensal">
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" value="<?=$cargaMensal?>" id="cargaMensal" name="cargaMensal">
            </div>
        </form>
    </body>    
</html>
