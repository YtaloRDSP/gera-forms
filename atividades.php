<html>
    <?php
        session_start();
        $nome = $_POST['nome'];
        $meta = $_POST['meta'];
        $parcela = $_POST['parcela'];
        $periodoMensal = $_POST['periodoMensal'];
        $cargaMensal = $_POST['cargaMensal'];
    ?>
    <script>
        function enviar(){
            document.getElementById("form").submit()
        }
        function slicer(str){
            novo = "";
            arr = [];
            i = 0;
            while(i < str.length){
                if(i==0){
                    arr.push(str.slice(i, i+10))
                    i = i+10
                }
                else{
                    arr.push(str.slice(i, i+11))
                    i = i+11
                }
            }
            novo = arr[0]
            for(i=1; i<arr.length; i++){
                novo += (" "+arr[i])
            }
            return novo
        }
        function tabela(){
            cargaTotal = Number("<?php echo $cargaMensal;?>")
            categoria = document.getElementById("categoria").value
            data = slicer(document.getElementById("data").value)
            item = document.getElementById("codigo").value
            atividade = document.getElementById("atividade").value
            ch = document.getElementById("ch").value

            var pretabela = new XMLHttpRequest();
            pretabela.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    document.getElementById("tabela").innerHTML = this.responseText;
                }
            };
            pretabela.open("GET", "tabela.php?data="+data+"&codigo="+item+"&atividade="+atividade+"&ch="+ch+"&categoria="+categoria+"&ct="+cargaTotal, true);
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
                pretabela.open("GET", "drop.php", true);
                pretabela.send();
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
    </head>

    <body onload="tabela()" class="teal darken-4">
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
                    </div>
                    <div class="divider"></div>
                    <h5>Inserir Novo Item</h5>
                    <div class="row">
                        <form class="col">
                            <div class="row">
                                <div class="input-field col s12">
                                    <select class="browser-default" id="categoria">
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
                            <div class="row">
                                <div class="input-field col s12 m6 l2">
                                    <textarea class="materialize-textarea" id="data"></textarea>
                                    <label for="data">Data:</label>
                                </div>
                                <div class="input-field col s12 m6 l2">
                                    <label for="codigo">Atividade:</label>
                                    <input type="text" class="form-control" id="codigo">
                                </div>
                                <div class="input-field col s12 m8 l6">
                                    <label for="atividade">Descrição da Atividade:</label>
                                    <input type="text" class="form-control" id="atividade">
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
