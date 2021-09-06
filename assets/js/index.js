var l_atv = JSON.parse(`[
                {"Numero":"1","Descricao":"Reuni\u00e3o Inicial(Kickoff)"},
                {"Numero":"2","Descricao":"Mapeamento do Processo, Identifica\u00e7\u00e3o e Descri\u00e7\u00e3o das Vari\u00e1veis relacionadas com o Processo"},
                {"Numero":"3","Descricao":"Defini\u00e7\u00e3o do Banco de Dados"},
                {"Numero":"4","Descricao":"Recebimento de Dados e Preparo do Servidor - MS Azure"},
                {"Numero":"5","Descricao":"An\u00e1lise Preliminar dos Dados"},
                {"Numero":"6","Descricao":"Modelagem do Processo"},
                {"Numero":"7","Descricao":"Valida\u00e7\u00e3o do Sistema de CEP"},
                {"Numero":"8","Descricao":"Implanta\u00e7\u00e3o do Sistema de CEP"},
                {"Numero":"9","Descricao":"Acompanhamento e Manuten\u00e7\u00e3o"},
                {"Numero":"10","Descricao":"Treinamento Six Sigma"}
            ]`)

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