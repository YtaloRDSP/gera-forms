var l_atv = JSON.parse('[{"Numero":"1","0":"1","Descricao":"Reuni\u00e3o Inicial(Kickoff)","1":"Reuni\u00e3o Inicial(Kickoff)"},{"Numero":"2","0":"2","Descricao":"Mapeamento do Processo, Identifica\u00e7\u00e3o e Descri\u00e7\u00e3o das Vari\u00e1veis relacionadas com o Processo","1":"Mapeamento do Processo, Identifica\u00e7\u00e3o e Descri\u00e7\u00e3o das Vari\u00e1veis relacionadas com o Processo"},{"Numero":"3","0":"3","Descricao":"Defini\u00e7\u00e3o do Banco de Dados","1":"Defini\u00e7\u00e3o do Banco de Dados"},{"Numero":"4","0":"4","Descricao":"Recebimento de Dados e Preparo do Servidor - MS Azure","1":"Recebimento de Dados e Preparo do Servidor - MS Azure"},{"Numero":"5","0":"5","Descricao":"An\u00e1lise Preliminar dos Dados","1":"An\u00e1lise Preliminar dos Dados"},{"Numero":"6","0":"6","Descricao":"Modelagem do Processo","1":"Modelagem do Processo"},{"Numero":"7","0":"7","Descricao":"Valida\u00e7\u00e3o do Sistema de CEP","1":"Valida\u00e7\u00e3o do Sistema de CEP"},{"Numero":"8","0":"8","Descricao":"Implanta\u00e7\u00e3o do Sistema de CEP","1":"Implanta\u00e7\u00e3o do Sistema de CEP"},{"Numero":"9","0":"9","Descricao":"Acompanhamento e Manuten\u00e7\u00e3o","1":"Acompanhamento e Manuten\u00e7\u00e3o"},{"Numero":"10","0":"10","Descricao":"Treinamento Six Sigma","1":"Treinamento Six Sigma"}]')
var ativ_selecionadas = []

function validar() {
    beneficiario = $('#nome').val()
    if (beneficiario == null) {
        alert("Bolsista não informado");
        document.getElementById("nome").focus()
        return null
    }

    atividades = $('#atividades').val()
    if (atividades.length != 0) {
        frase = ''
        for (i = 0; i < atividades.length; i++) {
            frase += atividades[i] + ','
        }
        document.getElementById("meta").value = frase.substr(0, frase.length - 1)
    } else {
        alert("Atividades não informadas");
        document.getElementById("atividades").focus()
        return null
    }

    parcela = $('#parcela').val()
    if (Number(parcela) == 0) {
        alert("Parcela não informada");
        document.getElementById("parcela").focus()
        return null
    }

    ch = $('#ch').val()
    if (Number(ch) == 0) {
        alert("Carga Horária não informada");
        document.getElementById("ch").focus()
        return null
    }

    inicio = $('#inicio').val()
    fim = $('#fim').val()
    if (inicio == '' || fim == '') {
        alert("Datas não informadas");
        document.getElementById("inicio").focus()
        document.getElementById("fim").focus()
        return null
    }

    var dI = new Date();
    var dF = new Date();
    dI.setFullYear(defData(inicio)[0], defData(inicio)[1], defData(inicio)[2]);
    dF.setFullYear(defData(fim)[0], defData(fim)[1], defData(fim)[2]);

    if (dI.getTime() >= dF.getTime()) {
        alert("Datas inválidas");
        document.getElementById("inicio").focus()
        document.getElementById("fim").focus()
        return null
    }
    document.getElementById("form").submit()
}

function defData(d) {
    let sep = d.split('-')
    return [Number(sep[0]), Number(sep[1]) - 1, Number(sep[2])]
}

function geraLista() {
    for (i = 0; i < document.getElementById("atividades").options.length; i++) {
        let d = document.getElementById("atividades").options[i].value
        let b = document.getElementById("atividades").options[i].text
        ativ_selecionadas.push([d, b, 0])
    }
}

function defineAtividade() {
    if (document.getElementById("at_selecionadas").innerHTML.length == 0) geraLista()
    let sel = document.getElementById("atividades").value
    for (i = 0; i < ativ_selecionadas.length; i++) {
        if (sel == ativ_selecionadas[i][0]) {
            ativ_selecionadas[i][2] = 1
            break
        }
    }
    showAtividades()
}

function showAtividades() {
    let selecionados = "<thead><tr><th class='col-10'>Atividade</th><th class='col-2'></th></thead><tbody>"
    frase = ''
    for (i = 0; i < ativ_selecionadas.length; i++) {
        if (ativ_selecionadas[i][2] == 1) {
            frase += ativ_selecionadas[i][0] + ','
            console.log(ativ_selecionadas[i][0])
        }
    }
    console.log(frase.substr(0, frase.length - 1))

    for (i = 0; i < ativ_selecionadas.length; i++) {
        if (ativ_selecionadas[i][2] == 1) {
            selecionados += "<tr><td class='col-10 justified'>" + ativ_selecionadas[i][0].split('-')[0] + '.' + ativ_selecionadas[i][1] + "</td><td class='col-2'><button class='btn btn-primary col-3 d-flex float-end d-lg-flex justify-content-center align-items-center justify-content-lg-center align-items-lg-center' data-bs-toggle='tooltip' data-bss-tooltip='' type='button' style='background: #264BBD;height: 25px;' onclick='retirar(" + i + ")' title='Excluir'><svg xmlns='http://www.w3.org/2000/svg' width='1em' height='1em' viewBox='0 0 16 16' fill='currentColor' class='bi bi-x' style='font-size: 20px;text-align: center;'><path fill-rule='evenodd' d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z'></path></svg></button></td></tr>"
                //selecionados += "<li class='align-items-sm-center col-9' style='margin-top: 5px;'>" + ativ_selecionadas[i][0].split('-')[0] + '.' + ativ_selecionadas[i][1] + "<button class='btn btn-primary col-3 d-flex float-end d-lg-flex justify-content-center align-items-center justify-content-lg-center align-items-lg-center' data-bs-toggle='tooltip' data-bss-tooltip='' type='button' style='background: #264BBD;height: 25px;' onclick='retirar(" + i + ")' title='Excluir'><svg xmlns='http://www.w3.org/2000/svg' width='1em' height='1em' viewBox='0 0 16 16' fill='currentColor' class='bi bi-x' style='font-size: 20px;text-align: center;'><path fill-rule='evenodd' d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z'></path></svg></button></li></div>"
        }
    }
    selecionados += "</tbody>"
    document.getElementById("at_selecionadas").innerHTML = selecionados
}

function retirar(n) {
    ativ_selecionadas[n][2] = 0
    showAtividades()
}