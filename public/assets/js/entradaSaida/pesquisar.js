$(document).ready(function () {
    $("#pesquisar").click(function () {
        let periodeDe = $('#periodeDe').val();
        let periodeAte = $('#periodeAte').val();
        let nt_lancamento = $('#nt_lancamento').val();
        let tipo_lancamento = $('#tipo_lancamento').val();

        if (periodeDe === "" || periodeAte === "") {
            MsgCamposEmpy();
        } else {
            window.location.replace("/entrada/saida/" + valueNull(date(periodeDe)) + '/' + valueNull(date(periodeAte)) + '/' + valueNull(nt_lancamento) + '/' + valueNull(tipo_lancamento))
        }

    });
});

function MsgCamposEmpy() {
// Override global options
    toastr.warning('Por favor Informe um perido de até!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
}

function valueNull(parament) {

    if (parament === "" || parament === "NaN-NaN-NaN" || parament === "undefined-undefined-") {
        return "null";
    }
    return parament;
}

function date($date) {
    let from = $date.split("/");
    return from[2] + "-" + from[1] + "-" + from[0];

}