var l_atv = JSON.parse(`[
    {
        "Numero":"1",
        "Descricao":"Reunião Inicial(Kickoff)"
    },
    {
        "Numero":"2",
        "Descricao":"Mapeamento do Processo, Identificação e Descrição das Variáveis relacionadas com o Processo"
    },
    {
        "Numero":"3",
        "Descricao":"Definição do Banco de Dados"
    },
    {
        "Numero":"4",
        "Descricao":"Recebimento de Dados e Preparo do Servidor - MS Azure"
    },
    {
        "Numero":"5",
        "Descricao":"Análise Preliminar dos Dados"
    },
    {
        "Numero":"6",
        "Descricao":"Modelagem do Processo"
    },
    {
        "Numero":"7",
        "Descricao":"Validação do Sistema de CEP"
    },
    {
        "Numero":"8",
        "Descricao":"Implantação do Sistema de CEP"
    },
    {
        "Numero":"9",
        "Descricao":"Acompanhamento e Manutenção"
    },
    {
        "Numero":"10",
        "Descricao":"Treinamento Six Sigma"
    }
]`)

var tabela = [];//variavel com os dados para exibir na tabela
var meta = [];//array com os numeros das atividades

var objTabela = []//variavel com os dados das atividades(Numero, Descricao, CH Total)
var objItens = []//variavel com os dados das subatividades, no formato JSON

itens = new Map()//variavel para armazenar as descricoes, deixando mais rápido o preenchimento

//funções de formatação
function defData(d) {//separa a string de data em um formato de vetor(ano, mês, dia)
    let sep = d.split('-')
    return [Number(sep[0]), Number(sep[1]) - 1, Number(sep[2])]
}

function porc(n) {//faz o calculo do percentual da carga horária
    return ((n * 100) / carga).toFixed(2)
}

function dtFormat(z) {//troca o / pelo -, formato aceitado para as datas no input(ano, mês, dia)
    n = z.split('/')
    return n[0] + '-' + n[1] + '-' + n[2]
}

function geraMeta() {//gera a string a ser exibida com os nomes das atividades selecionadas
    let retorno = ''
    for (i of meta) {
        retorno += l_atv[i - 1].Descricao + '/'
    }
    return retorno.substr(0, retorno.length - 1)
}

function opcoes(){//cria as opçoes de atividade, baseado na meta
    let html = '<option></option>'
    for(i of meta){
        html += '<option value="'+i+'">'+i+'</option>'
    }
    return html
}

function geraBotoes(n) {//gera os botoes de excluir e alterar
    let cdHTML = "<td class='d-flex justify-content-center align-items-center col-1' style='padding: 3px;'><a class='btn btn-primary btn-sm text-end d-flex float-start d-lg-flex justify-content-center align-items-center justify-content-lg-center align-items-lg-center' role='button' data-bs-toggle='tooltip' data-bss-tooltip=''"
    cdHTML += "style='margin-left: 0px;height: 40px;text-align: left;margin-right: 10px;background: #264BBD;' title='Atualizar item' onclick='atualiza(" + n + ")'><i class='material-icons' style='font-size: 20px;text-align: center;'>refresh</i></a>"
    cdHTML += "<a class='btn btn-primary btn-sm text-end d-flex float-start d-lg-flex justify-content-center align-items-center justify-content-lg-center align-items-lg-center' role='button' data-bs-toggle='tooltip' data-bss-tooltip=''"
    cdHTML += "style='margin-left: 0px;height: 40px;text-align: left;margin-right: 0px;background: #264BBD;' title='Excluir item' onclick='excluir(" + n + ")'><i class='material-icons' style='font-size: 20px;text-align: center;'>delete_forever</i></a></td>"
    return cdHTML
}

function calend(m, n) {//gera a string a ser exibida no arquivo com o periodo das atividades
    let retorno = ''
    m = m.split('-')
    retorno += m[2] + '/' + m[1] + '/' + m[0] + ' a '
    n = n.split('-')
    retorno += n[2] + '/' + n[1] + '/' + n[0]
    return retorno
}

function dtFinal(n) {//define a ultima data, e consequentemente, dia da assinatura do arquivo
    let retorno = ''
    n = n.split('-')
    retorno += n[2] + '/' + n[1] + '/' + n[0]
    return retorno
}

//função inicial do programa
function inicializar() {
    meta = atividades.split(',')
    analisar()
    gera_tabela()
}

function analisar() {//função para armazenar as datas uteis no periodo informado
    var d1 = new Date();
    var d2 = new Date();
    
    d1.setFullYear(defData(inicio)[0],defData(inicio)[1],defData(inicio)[2]);//inicio do periodo(ano, mês, dia)
    d2.setFullYear(defData(fim)[0],defData(fim)[1],defData(fim)[2]);//fim do periodo

    dIter = d1
    diasPeriodo = []
    while (dIter.getTime() <= d2.getTime()) {
        diaSemana = dIter.getDay();
        if (diaSemana != 0 && diaSemana != 6 && !feriado(dIter.getDate(), dIter.getMonth())) {
            diasPeriodo.push(`${dIter.getFullYear()}/${dIter.getMonth() + 1 > 9 ? dIter.getMonth() + 1 : '0' + (dIter.getMonth() + 1)}/${dIter.getDate() > 9 ? dIter.getDate() : '0'+dIter.getDate()}`);
        }
        dIter.setDate(dIter.getDate() + 1)
    }
    cDiaria = diasPeriodo.length > 20 ? (carga / 20) : (carga / diasPeriodo.length)

    iD = 0
    cTotal = 0
    while (cTotal < carga) {
        tabela.push({
            data: diasPeriodo[iD],
            atividade: "",
            descricao: "",
            ch: cDiaria
        })
        iD++
        cTotal+=cDiaria
    }
}

function feriado(dia, mes) {//verifica se a data é um feriado
    let feriados = [
        [1, 0],
        [21, 3],
        [1, 4],
        [3, 5],
        [7, 8],
        [12, 9],
        [2, 10],
        [15, 10],
        [25, 11]
    ];
    for (i of feriados) {
        if (dia == i[0] && mes == i[1]) return true
    }
    return false
}

function gera_tabela() {
    ordenar()
    let cabecalho = []//saber quando gerar o cabeçalho de cada atividade
    objTabela = []//limpar para não acumular valores anteriores
    let html = ''
    for (j = 0; j < tabela.length; j++){//percorre toda a tabela
        if(!cabecalho.includes(Number(tabela[j].atividade.split('-')[0]))){//se a atividade não estiver no array, deve gerar o cabeçalho dela
            if(Number(tabela[j].atividade.split('-')[0]) == 0){//no caso dos itens nulos
                html += `<tr style='background: #384670;color: var(--bs-white);'>
                            <td class='col-2'></td>
                            <td class='col-1'></td>
                            <td class='col-6'>Não identificado</td>
                            <td class='col-2'></td>
                            <td></td>
                        </tr>`;
            } else{//no caso dos itens para contabilizar
                let atividadePrincipal = tabela[j].atividade.split('-')[0];//numero da atividade
                let descricaoPrincipal = l_atv[Number(tabela[j].atividade.split('-')[0]) - 1].Descricao//descricao da atividade
                let chPrincipal = tabela.filter(n => n.atividade.split('-')[0] == tabela[j].atividade.split('-')[0]).reduce(function (result, item) {
                    return result + item.ch;
                }, 0)//reduce para achar o total de carga horária da atividade
                objTabela.push({
                    atividade: atividadePrincipal,
                    descricao: descricaoPrincipal,
                    ch: chPrincipal
                })//passando para a variavel os valores, para usar no arquivo
                html += `<tr style='background: #384670;color: var(--bs-white);'>
                            <td class='col-2'></td>
                            <td class='col-1'>${atividadePrincipal}</td>
                            <td class='col-6'>${descricaoPrincipal}</td>
                            <td class='col-2'>${chPrincipal}h| ${porc(chPrincipal)}%</td>
                            <td></td>
                        </tr>`
            }     
            cabecalho.push(Number(tabela[j].atividade.split('-')[0]))//adiciona atividade ao cabeçalho, indicando que foi apresentada
        }
        html += `<tr>
                    <td class='col-2'><input type='date' id='dt${j}' value='${dtFormat(tabela[j].data)}'></td>
                    <td class='col-2'>
                        <select class='col-4' id='at${j}' value='${tabela[j].atividade.split('-')[0]==undefined ? '':tabela[j].atividade.split('-')[0]}'>${opcoes()}</select>
                        <input type='text' class='col-4 num' id='subAt${j}' onchange='repete(${j})' value='${tabela[j].atividade.split('-')[1]==undefined ? '':tabela[j].atividade.split('-')[1]}'>
                    </td>
                    <td class='col-6'><input type='text' class='col-12' id='sel${j}' onblur='armazena(${j})' value='${tabela[j].descricao}'></td>
                    <td class='col-2'><input type='text' id='cI${j}' class='num' style='width: 40px;' value='${tabela[j].ch}'>h| ${porc(tabela[j].ch)}%</td>
                    ${geraBotoes(j)}
                </tr>`;//exibe o item
    }
    sT = tabela.filter(n => Number(n.atividade.split('-')[0]) != 0).reduce(function (result, item) {
        return result + item.ch;
    }, 0)
    html += `<tr style='background: #384670;color: var(--bs-white);'>
                <td class='col-2'></td>
                <td class='col-1'></td>
                <td class='col-2'>TOTAL</td>
                <td class='col-2'>${sT}h| ${porc(sT)}%</td>
                <td></td>
            </tr>`
    
    document.getElementById("tabela").innerHTML = html
    $('.num').mask('00')
    for (j = 0; j < tabela.length; j++){//força os seletores a exibirem a atividade correta
        if(Number(tabela[j].atividade.split('-')[0])!=0){
            $('#at'+j).val(tabela[j].atividade.split('-')[0])
        }
    }
}

function ordenar() {
    tabela.sort(function(a,b){
        let idAtiv = a.atividade.split('-')[0] == b.atividade.split('-')[0]//compara se atividades são iguais
        let idsubAt = a.atividade.split('-')[1] == b.atividade.split('-')[1]
        if(Number(a.atividade.split('-')[0]) < Number(b.atividade.split('-')[0])){//ordena por atividade
            return -1
        }
        else if(Number(a.atividade.split('-')[1]) < Number(b.atividade.split('-')[1]) && idAtiv){//ordena por subatividade
            return -1       
        }
        else if(a.data < b.data && idAtiv && idsubAt){//ordena por dia
            return -1       
        } else{
            return true
        }
    })
}

function groupBy(list, keyGetter) {
    const map = new Map();
    list.forEach((item) => {
         const key = keyGetter(item);
         const collection = map.get(key);
         if (!collection) {
             map.set(key, [item]);
         } else {
             collection.push(item);
         }
    });
    return map;
}

//funcoes auxiliares da tabela
function excluir(n) {//excluir item da tabela
    var cn = confirm("Tem certeza que deseja excluir este item da tabela?")
    if (cn) {
        tabela.splice(n, 1)
        gera_tabela()
    }
}

function atualiza(n) {//atualiza todos os itens na tabela
    var cn = confirm("Tem certeza que deseja alterar os itens da tabela?")
    if (cn) {
        for(i = 0; i<tabela.length; i++){
            if(document.getElementById("sel" + i).value != ''){
                tabela[i].atividade = document.getElementById("at" + i).value + '-' + document.getElementById("subAt" + i).value//une a atividade e a subatividade
                tabela[i].descricao = document.getElementById("sel" + i).value //descricao
                let dTemp = (document.getElementById("dt" + i).value).split('-') //data
                tabela[i].data = `${dTemp[0]}/${dTemp[1]}/${dTemp[2]}`
                tabela[i].ch = Number(document.getElementById("cI" + i).value) //carga horaria
            }
        }
        gera_tabela()
    }
}



function armazena(n){//armazena as descrições, usando como chave o valor da subatividade
    if($('#at'+n).val() == '' || $('#subAt'+n).val() == '') return
    if(!itens.has($('#at'+n).val() +'-'+ $('#subAt'+n).val()) && $('#sel'+n).val() != ''){
        itens.set($('#at'+n).val() +'-'+ $('#subAt'+n).val(), $('#sel'+n).val())
    }
}

function repete(n){//ao detectar a subatividade, automaticamente o sistema preenche a descrição
    if(itens.has($('#at'+n).val() +'-'+ $('#subAt'+n).val()) && $('#sel'+n).val() == ''){
        $('#sel'+n).val(itens.get($('#at'+n).val() +'-'+ $('#subAt'+n).val()))
    } else armazena(n)
}

function adiciona() {//adiciona uma nova linha, em branco
    tabela.push({
        data: '',
        atividade: "",
        descricao: "",
        ch: 0
    })
    gera_tabela()
}

//funçoes para auxilio nos dados a serem passados para o documento
function geraObjeto() {
    objItens = []//esvazia os objetos, para não ser afetado por itens anteriores
    for(i = 0; i < objTabela.length; i++){//se baseia em todos os itens presentes na lista das atividades
        let itemTemp = []//armazenar o formato da data
        let filtrado = tabela.filter(n => n.atividade.split('-')[0] == objTabela[i].atividade)//filtra apenas os itens daquela atividade no loop
        let agrupado = groupBy(filtrado, n => n.atividade.split('-')[1])//separa pelas subatividades
        agrupado.forEach((value, key, map) => {
            let dts = value.map(item => `${item.data.split('/')[2]}/${item.data.split('/')[1]}/${item.data.split('/')[0]}(${item.ch}h)`)//gera um array com as datas e horários com mesma subatividade
            dts = dts.join(' ')//une no formato de string
            let ch = value.reduce(function (result, item) {//faz o calculo do total de carga horária da subatividade
                return result + item.ch;
            }, 0)//reduce para achar o total de carga horária da atividade
            itemTemp.push('{ "Dias": "' + dts + '", "Codigo": "' + value[0].atividade.replace("-", ".") + '", "Atividade": "' + value[0].descricao + '", "CH": "' + ch + 'h|' + porc(ch) + '%"}')//string a ser transformada em JSON
        });
        let strItem = '{ "at": ['
        strItem += itemTemp.join(',')
        strItem += ']}'
        objItens.push(strItem)
    }
    if (objItens.length != 10) {//preenche até o decimo item com valores, pois o sistema dá falha se houver vazios
        while (objItens.length < 10) {
            objItens.push(objItens[0])
        }
    }
    if (objTabela.length != 10) {
        while (objTabela.length < 10) {
            objTabela.push(objTabela[0])
        }
    }
}

//função para gerar documento
function geraDoc() {
    geraObjeto()
    now = new Date
    meses = [
        'Janeiro',
        'Fevereiro',
        'Março',
        'Abril',
        'Maio',
        'Junho',
        'Julho',
        'Agosto',
        'Setembro',
        'Outubro',
        'Novembro',
        'Dezembro'
    ]

    function loadFile(url, callback) {
        PizZipUtils.getBinaryContent(url, callback);
    }
    tamanho = meta.length
    coor = (nome == "LIZANDRO MANZATO") ? 'Coor' : ''
    arquivo = "assets/word/rel" + coor + tamanho + ".docx"
    now = new Date

    loadFile(arquivo, function(error, content) {
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
            console.log(JSON.stringify({ error: error }, replaceErrors));

            if (error.properties && error.properties.errors instanceof Array) {
                const errorMessages = error.properties.errors.map(function(error) {
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
            doc = new window.docxtemplater(zip);
        } catch (error) {
            // Catch compilation errors (errors caused by the compilation of the template : misplaced tags)
            errorHandler(error);
        }
        doc.setData({
            nome: pack['Nome'],
            cpf: pack['CPF'],
            rg: pack['RG'],
            uf: pack['UF'],
            email: pack['Email'],
            fone: pack['Fone'],
            funcao: pack['Funcao'],
            contrato: pack['Contrato'],
            proc: pack['Procur'],
            periodoTotal: pack['PeriodoTotal'],
            ch: pack['CargaTotal'],
            modalidade: pack['Modalidade'],
            periodoTotal: pack['PeriodoTotal'],
            cargaTotal: pack['CargaTotal'],
            mes: (now.getMonth() + 1) < 10 ? "0" + (now.getMonth() + 1) : (now.getMonth() + 1),
            parcela: parcela,
            periodoMensal: calend(inicio, fim),
            cargaMensal: carga,
            meta: geraMeta(),
            final: dtFinal(fim),

            ind1: objTabela[0].atividade,
            ativ1: objTabela[0].descricao,
            totalCH1: objTabela[0].ch + 'h|' + porc(objTabela[0].ch) + '%',
            at1: JSON.parse(objItens[0]).at,

            ind2: objTabela[1].atividade,
            ativ2: objTabela[1].descricao,
            totalCH2: objTabela[1].ch + 'h|' + porc(objTabela[0].ch) + '%',
            at2: JSON.parse(objItens[1]).at,

            ind3: objTabela[2].atividade,
            ativ3: objTabela[2].descricao,
            totalCH3: objTabela[2].ch + 'h|' + porc(objTabela[2].ch) + '%',
            at3: JSON.parse(objItens[2]).at,

            ind4: objTabela[3].atividade,
            ativ4: objTabela[3].descricao,
            totalCH4: objTabela[3].ch + 'h|' + porc(objTabela[3].ch) + '%',
            at4: JSON.parse(objItens[3]).at,

            ind5: objTabela[4].atividade,
            ativ5: objTabela[4].descricao,
            totalCH5: objTabela[4].ch + 'h|' + porc(objTabela[4].ch) + '%',
            at5: JSON.parse(objItens[4]).at,

            ind6: objTabela[5].atividade,
            ativ6: objTabela[5].descricao,
            totalCH6: objTabela[5].ch + 'h|' + porc(objTabela[5].ch) + '%',
            at6: JSON.parse(objItens[5]).at,
        });
        try {
            // render the document (replace all occurences of {first_name} by John, {last_name} by Doe, ...)
            doc.render();
        } catch (error) {
            // Catch rendering errors (errors relating to the rendering of the template : angularParser throws an error)
            errorHandler(error);
        }
        arqNome = nome + "-" + meses[now.getMonth()]

        var out = doc.getZip().generate({
                type: "blob",
                mimeType: "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
            }) //Output the document using Data-URI
        saveAs(out, arqNome + ".docx")
    })
}