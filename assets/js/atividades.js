var l_sub = new Map();
var l_atv = JSON.parse('[{"Numero":"1","0":"1","Descricao":"Reuni\u00e3o Inicial(Kickoff)","1":"Reuni\u00e3o Inicial(Kickoff)"},{"Numero":"2","0":"2","Descricao":"Mapeamento do Processo, Identifica\u00e7\u00e3o e Descri\u00e7\u00e3o das Vari\u00e1veis relacionadas com o Processo","1":"Mapeamento do Processo, Identifica\u00e7\u00e3o e Descri\u00e7\u00e3o das Vari\u00e1veis relacionadas com o Processo"},{"Numero":"3","0":"3","Descricao":"Defini\u00e7\u00e3o do Banco de Dados","1":"Defini\u00e7\u00e3o do Banco de Dados"},{"Numero":"4","0":"4","Descricao":"Recebimento de Dados e Preparo do Servidor - MS Azure","1":"Recebimento de Dados e Preparo do Servidor - MS Azure"},{"Numero":"5","0":"5","Descricao":"An\u00e1lise Preliminar dos Dados","1":"An\u00e1lise Preliminar dos Dados"},{"Numero":"6","0":"6","Descricao":"Modelagem do Processo","1":"Modelagem do Processo"},{"Numero":"7","0":"7","Descricao":"Valida\u00e7\u00e3o do Sistema de CEP","1":"Valida\u00e7\u00e3o do Sistema de CEP"},{"Numero":"8","0":"8","Descricao":"Implanta\u00e7\u00e3o do Sistema de CEP","1":"Implanta\u00e7\u00e3o do Sistema de CEP"},{"Numero":"9","0":"9","Descricao":"Acompanhamento e Manuten\u00e7\u00e3o","1":"Acompanhamento e Manuten\u00e7\u00e3o"},{"Numero":"10","0":"10","Descricao":"Treinamento Six Sigma","1":"Treinamento Six Sigma"}]')
var ltemp_sub = JSON.parse('[{"Numero":"3","0":"3","Descricao":"Defini\u00e7\u00e3o do banco de dados espelho extra\u00eddo do sistema corporativo","1":"Defini\u00e7\u00e3o do banco de dados espelho extra\u00eddo do sistema corporativo","Subitem":"1","2":"1"},{"Numero":"3","0":"3","Descricao":"Elabora\u00e7\u00e3o do protocolo de base de dados e de confidencialidade","1":"Elabora\u00e7\u00e3o do protocolo de base de dados e de confidencialidade","Subitem":"2","2":"2"},{"Numero":"3","0":"3","Descricao":"Recebimento dos dados","1":"Recebimento dos dados","Subitem":"3","2":"3"},{"Numero":"3","0":"3","Descricao":"Mapeamento, aprecia\u00e7\u00e3o e norteamento de aquisi\u00e7\u00e3o e demandas por disp\u00eandio junto \u00e0 Faepi","1":"Mapeamento, aprecia\u00e7\u00e3o e norteamento de aquisi\u00e7\u00e3o e demandas por disp\u00eandio junto \u00e0 Faepi","Subitem":"4","2":"4"},{"Numero":"3","0":"3","Descricao":"Controle no fluxo de entrada e sa\u00edda de correspond\u00eancias","1":"Controle no fluxo de entrada e sa\u00edda de correspond\u00eancias","Subitem":"5","2":"5"},{"Numero":"3","0":"3","Descricao":"Reuni\u00e3o semanal com a equipe de trabalho IFAM \u2013 Apresentar os objetivos, prazos e cronogramas","1":"Reuni\u00e3o semanal com a equipe de trabalho IFAM \u2013 Apresentar os objetivos, prazos e cronogramas","Subitem":"6","2":"6"},{"Numero":"3","0":"3","Descricao":"Organiza\u00e7\u00e3o, prepara\u00e7\u00e3o e arquivamento de documentos conforme procedimentos","1":"Organiza\u00e7\u00e3o, prepara\u00e7\u00e3o e arquivamento de documentos conforme procedimentos","Subitem":"7","2":"7"},{"Numero":"3","0":"3","Descricao":"Visita na Empresa Arris para defini\u00e7\u00e3o do processo de trabalho","1":"Visita na Empresa Arris para defini\u00e7\u00e3o do processo de trabalho","Subitem":"8","2":"8"},{"Numero":"3","0":"3","Descricao":"Elabora\u00e7\u00e3o de atas de Reuni\u00e3o, Of\u00edcio, Memorandos, Relat\u00f3rios e Planilhas conforme Procedimentos da Faepi","1":"Elabora\u00e7\u00e3o de atas de Reuni\u00e3o, Of\u00edcio, Memorandos, Relat\u00f3rios e Planilhas conforme Procedimentos da Faepi","Subitem":"9","2":"9"},{"Numero":"10","0":"10","Descricao":"Acompanhamento\/monitoramento do software action no microsoft azure","1":"Acompanhamento\/monitoramento do software action no microsoft azure","Subitem":"1","2":"1"},{"Numero":"10","0":"10","Descricao":"Mapeamento, aprecia\u00e7\u00e3o e norteamento de aquisi\u00e7\u00e3o e demandas por disp\u00eandio junto \u00e0 Faepi","1":"Mapeamento, aprecia\u00e7\u00e3o e norteamento de aquisi\u00e7\u00e3o e demandas por disp\u00eandio junto \u00e0 Faepi","Subitem":"2","2":"2"},{"Numero":"10","0":"10","Descricao":"Controle no fluxo de entrada e sa\u00edda de correspond\u00eancias","1":"Controle no fluxo de entrada e sa\u00edda de correspond\u00eancias","Subitem":"3","2":"3"},{"Numero":"10","0":"10","Descricao":"Reuni\u00e3o semanal com a equipe de trabalho IFAM \u2013 Apresentar os objetivos, prazos e cronogramas","1":"Reuni\u00e3o semanal com a equipe de trabalho IFAM \u2013 Apresentar os objetivos, prazos e cronogramas","Subitem":"4","2":"4"},{"Numero":"10","0":"10","Descricao":"Elabora\u00e7\u00e3o de atas de Reuni\u00e3o, Of\u00edcio, Memorandos, Relat\u00f3rios e Planilhas conforme Procedimentos da Faepi","1":"Elabora\u00e7\u00e3o de atas de Reuni\u00e3o, Of\u00edcio, Memorandos, Relat\u00f3rios e Planilhas conforme Procedimentos da Faepi","Subitem":"5","2":"5"}]')

var tabela = [];
var meta = new Set();
var stmSel = ''

var objTabela = []
var objItens = []

function inicializar() {
    analisar()
    console.log(pack)
    console.log(ltemp_sub)
    console.log(l_atv)
    for (i = 0; i < ltemp_sub.length; i++) {
        l_sub.set(ltemp_sub[i].Numero + '-' + ltemp_sub[i].Subitem, ltemp_sub[i].Descricao)
    }
    stmSel = geraSelect()
    document.getElementById("nI_ativ").innerHTML = stmSel
    gera_tabela()
}

function analisar() {
    var d1 = new Date();
    var d2 = new Date();

    d1.setFullYear(defData(inicio)[0], defData(inicio)[1], defData(inicio)[2]);
    d2.setFullYear(defData(fim)[0], defData(fim)[1], defData(fim)[2]);

    dIter = d1
    diasPeriodo = []
    while (dIter.getTime() <= d2.getTime()) {
        diaSemana = dIter.getDay();
        if (diaSemana != 0 && diaSemana != 6 && !feriado(dIter.getDate(), dIter.getMonth())) {
            diasPeriodo.push([dIter.getDate() + '-' + (dIter.getMonth() + 1) + '-' + dIter.getFullYear(), dIter.getDay()]);
        }
        dIter.setDate(dIter.getDate() + 1)
    }

    var itensAt = atividades.split(',') //itens em forma de array
    for (i of itensAt) {
        at = i.split('-')
        meta.add(Number(at[0]))
    }

    var atReunioes = ['3-6', '3-9', '10-4', '10-5']
    var atReunioes_dS = [1, 2, 3, 5]
    reunioes = []
    for (i of atReunioes) {
        if (itensAt.includes(i)) {
            reunioes.push(i)
            itensAt.splice(itensAt.indexOf(i), 1);
        }
    }

    chA = (carga - (reunioes.length * 4) / itensAt.length)
    cDiaria = diasPeriodo.length > 20 ? (carga / 20) : (carga / diasPeriodo.length)

    iA = 0
    iD = 0
    cTotal = 0

    while (cTotal < carga) {
        cDia = 0
        if ((diasPeriodo[iD][1] == 1 || diasPeriodo[iD][1] == 2 || diasPeriodo[iD][1] == 3 || diasPeriodo[iD][1] == 5) && (reunioes.length > 0)) {
            let itemTemp = atReunioes[atReunioes_dS.indexOf(diasPeriodo[iD][1])]
            if (reunioes.includes(itemTemp)) {
                item = [itemTemp, diasPeriodo[iD], 1]
                tabela.push(item)
                cDia++
                cTotal++
            }

        }
        item = [itensAt[iA % itensAt.length], diasPeriodo[iD], cDiaria - cDia]
        tabela.push(item)
        cTotal += cDiaria - cDia
        iA++
        iD++
    }
}

function defData(d) {
    let sep = d.split('-')
    return [Number(sep[0]), Number(sep[1]) - 1, Number(sep[2])]
}

function feriado(dia, mes) {
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
    document.getElementById("tabela").innerHTML = "<thead><tr><th class='col-2'>Data</th><th class='col-1'>Atividade</th><th class='col-6'>Descrição</th><th class='col-2'>CH</th><th></th></tr></thead><tbody>"
    ordenar()
    tema()
}

function ordenar() {
    for (i = 0; i < tabela.length; i++) { //ordena pela atividade
        ref = tabela[i]
        for (j = i; j < tabela.length; j++) {
            let c1 = Number(tabela[j][0].split('-')[0])
            let c2 = Number(ref[0].split('-')[0])
            if (c1 < c2) {
                alt = tabela[j]
                tabela[j] = ref
                ref = alt
            }
        }
        tabela[i] = ref
    }

    for (i = 0; i < tabela.length; i++) { //ordena pela sub-atividade
        ref = tabela[i]
        for (j = i; j < tabela.length; j++) {
            let c1 = Number(tabela[j][0].split('-')[0])
            let c2 = Number(ref[0].split('-')[0])
            let c3 = Number(tabela[j][0].split('-')[1])
            let c4 = Number(ref[0].split('-')[1])
            if (c1 == c2 && c3 < c4) {
                alt = tabela[j]
                tabela[j] = ref
                ref = alt
            }
        }
        tabela[i] = ref
    }

    for (i = 0; i < tabela.length; i++) { //ordena pela data
        ref = tabela[i]
        for (j = i; j < tabela.length; j++) {
            let c1 = Number(tabela[j][0].split('-')[0])
            let c2 = Number(ref[0].split('-')[0])
            let c3 = Number(tabela[j][0].split('-')[1])
            let c4 = Number(ref[0].split('-')[1])
            let c5 = new Date();
            let c6 = new Date();
            c5.setFullYear(defData(tabela[j][1][0])[2], defData(tabela[j][1][0])[1], defData(tabela[j][1][0])[0]);
            c6.setFullYear(defData(ref[1][0])[2], defData(ref[1][0])[1], defData(ref[1][0])[0]);
            if (c1 == c2 && c3 == c4 && c5.getTime() < c6.getTime()) {
                alt = tabela[j]
                tabela[j] = ref
                ref = alt
            }
        }
        tabela[i] = ref
    }
}

function tema() {
    sT = 0
    while (i < objTabela.length) {
        objTabela.pop()
        i++
    }
    for (i of meta) {
        sI = 0
        for (j = 0; j < tabela.length; j++) {
            if (i == Number(tabela[j][0].split('-')[0])) {
                sI += tabela[j][2]
            }
        }
        objTabela.push([i, l_atv[i - 1].Descricao, sI])
        sT += sI
        document.getElementById("tabela").innerHTML += "<tr style='background: #384670;color: var(--bs-white);'><td class='col-2'></td><td class='col-1'>" + i + "</td><td class='col-6'>" + l_atv[i - 1].Descricao + "</td><td class='col-2'>" + sI + "h|" + porc(sI) + "%</td><td></td></tr>"
        for (j = 0; j < tabela.length; j++) {
            if (i == Number(tabela[j][0].split('-')[0])) {
                document.getElementById("tabela").innerHTML += "<tr><td class='col-2'><input type='date' id='dt" + j + "' value='" + dtFormat(tabela[j][1][0]) + "'></td><td class='col-1'>" + tabela[j][0].replace('-', '.') + "</td><td class='col-6'><select  class='col-12' id='sel" + j + "'>" + stmSel + "</select></td><td class='col-2'><input type='text' id='cI" + j + "' style='width: 40px;' value='" + tabela[j][2] + "'>h|" + porc(tabela[j][2]) + "%</td>" + geraBotoes(j) + " </tr>"
            }
        }
    }

    document.getElementById("tabela").innerHTML += "<tr style='background: #384670;color: var(--bs-white);'><td class='col-2'></td><td class='col-1'></td><td class='col-2'>TOTAL</td><td class='col-2'>" + sT + "h|" + porc(sT) + "%</td><td></td></tr>"
    document.getElementById("tabela").innerHTML += "</tbody></table>"

    for (i = 0; i < tabela.length; i++) {
        document.getElementById("sel" + i).value = tabela[i][0]
    }
}

function porc(n) {
    return ((n * 100) / carga).toFixed(2)
}

function dtFormat(z) {
    n = z.split('-')
    if (Number(n[0]) < 10) n[0] = '0' + n[0]
    if (Number(n[1]) < 10) n[1] = '0' + n[1]
    return n[2] + '-' + n[1] + '-' + n[0]
}

function geraSelect() {
    let cdHTML = ''
    for (t of meta) {
        cdHTML += "<optgroup label='" + t + "-" + l_atv[t - 1].Descricao + "'>"
        for (k = 1; l_sub.has(t + '-' + k); k++) {
            cdHTML += "<option value='" + t + "-" + k + "'>" + t + "." + k + " - " + l_sub.get(t + '-' + k) + "</option>"
        }
        cdHTML += "</optgroup>"
    }
    return cdHTML;
}

function geraMeta() {
    let retorno = ''
    for (i of meta) {
        retorno += l_atv[i - 1].Descricao + '/'
    }
    return retorno.substr(0, retorno.length - 1)
}

function geraBotoes(n) {
    let cdHTML = "<td class='d-flex justify-content-center align-items-center col-1' style='padding: 3px;'><a class='btn btn-primary btn-sm text-end d-flex float-start d-lg-flex justify-content-center align-items-center justify-content-lg-center align-items-lg-center' role='button' data-bs-toggle='tooltip' data-bss-tooltip=''"
    cdHTML += "style='margin-left: 0px;height: 40px;text-align: left;margin-right: 10px;background: #264BBD;' title='Atualizar item' onclick='atualiza(" + n + ")'><i class='material-icons' style='font-size: 20px;text-align: center;'>refresh</i></a>"
    cdHTML += "<a class='btn btn-primary btn-sm text-end d-flex float-start d-lg-flex justify-content-center align-items-center justify-content-lg-center align-items-lg-center' role='button' data-bs-toggle='tooltip' data-bss-tooltip=''"
    cdHTML += "style='margin-left: 0px;height: 40px;text-align: left;margin-right: 0px;background: #264BBD;' title='Excluir item' onclick='excluir(" + n + ")'><i class='material-icons' style='font-size: 20px;text-align: center;'>delete_forever</i></a></td>"
    return cdHTML
}

function excluir(n) {
    var cn = confirm("Tem certeza que deseja excluir este item da tabela?")
    if (cn) {
        tabela.splice(n, 1)
        gera_tabela()
    }
}

function atualiza(n) {
    var cn = confirm("Tem certeza que deseja alterar este item da tabela?")
    if (cn) {
        tabela[n][0] = document.getElementById("sel" + n).value //atividade

        let dTemp = (document.getElementById("dt" + n).value).split('-') //data
        tabela[n][1] = [Number(dTemp[2]) + '-' + Number(dTemp[1]) + '-' + dTemp[0], 8]

        tabela[n][2] = Number(document.getElementById("cI" + n).value) //carga horaria

        gera_tabela()
    }
}

function addItem() {
    let nA = document.getElementById("nI_ativ").value

    let dTemp = (document.getElementById("nI_data").value).split('-')
    let nT = [Number(dTemp[2]) + '-' + Number(dTemp[1]) + '-' + dTemp[0], 8]

    let nC = Number(document.getElementById("nI_ch").value)

    tabela.push([nA, nT, nC])

    gera_tabela()
}

function calend(m, n) {
    let retorno = ''
    m = m.split('-')
    retorno += m[2] + '/' + m[1] + '/' + m[0] + ' a '
    n = n.split('-')
    retorno += n[2] + '/' + n[1] + '/' + n[0]
    return retorno
}

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
    tamanho = 2
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
            mes: "0" + (now.getMonth() + 1),
            mes: (now.getMonth() + 1) < 10 ? "0" + (now.getMonth() + 1) : (now.getMonth() + 1),
            parcela: parcela,
            periodoMensal: calend(inicio, fim),
            cargaMensal: carga,
            meta: geraMeta(),

            ind1: objTabela[0][0],
            ativ1: objTabela[0][1],
            totalCH1: objTabela[0][2] + 'h|' + porc(objTabela[0][2]) + '%',
            at1: JSON.parse(objItens[0]).at,

            ind2: objTabela[1][0],
            ativ2: objTabela[1][1],
            totalCH2: objTabela[1][2] + 'h|' + porc(objTabela[1][2]) + '%',
            at2: JSON.parse(objItens[1]).at,

            ind3: objTabela[2][0],
            ativ3: objTabela[2][1],
            totalCH3: objTabela[2][2] + 'h|' + porc(objTabela[2][2]) + '%',
            at3: JSON.parse(objItens[2]).at,

            ind4: objTabela[3][0],
            ativ4: objTabela[3][1],
            totalCH4: objTabela[3][2] + 'h|' + porc(objTabela[3][2]) + '%',
            at4: JSON.parse(objItens[3]).at,

            ind5: objTabela[4][0],
            ativ5: objTabela[4][1],
            totalCH5: objTabela[4][2] + 'h|' + porc(objTabela[4][2]) + '%',
            at5: JSON.parse(objItens[4]).at
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

function geraObjeto() {
    i = 0
    while (i < objItens.length) {
        objItens.pop()
        i++
    }
    i = 0
    let j = 0

    for (t of meta) {
        let itemTemp = '{ "at" : ['
        let iter = tabela[j][0].split('-')[0]
        while (t == iter && j < tabela.length) {
            let ref = tabela[j][0]
            let dt = ''
            let cT = 0
            while (j < tabela.length) {
                if (ref == tabela[j][0]) {
                    let dT1 = tabela[j][1][0].split('-')
                    dT1[0] = (Number(dT1[0]) < 10) ? "0" + dT1[0] : dT1[0]
                    dT1[1] = (Number(dT1[1]) < 10) ? "0" + dT1[1] : dT1[1]
                    dt += dT1[0] + '/' + dT1[1] + '/' + dT1[2]
                    dt += "(" + tabela[j][2] + "h) "
                    cT += tabela[j][2]
                    j++
                } else break
            }
            itemTemp += '{ "Dias": "' + dt + '", "Codigo": "' + ref.replace('-', '.') + '", "Atividade": "' + l_sub.get(ref) + '", "CH": "' + cT + 'h|' + porc(cT) + '%" },'
            iter = j < tabela.length ? tabela[j][0].split('-')[0] : j
        }
        itemTemp = itemTemp.substr(0, itemTemp.length - 1)
        itemTemp += ']}'
        objItens.push(itemTemp)
    }
    if (objItens.length != 10) {
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