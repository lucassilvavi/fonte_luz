$(document).ready(function () {
    $("#pesquisar").click(function () {
        var classificacaoPagamento = $("input[name='classificacaoPagamento']:checked").val();
        var periodeDe = $('#periodeDe').val();
        var periodeAte = $('#periodeAte').val();
        var membro = $('#membro').val();

        $.ajax({
            type: "get",
            url: "/getContribuicoes/" + valueNull(classificacaoPagamento) + '/' + valueNull(date(periodeDe)) + '/' + valueNull(date(periodeAte)) + '/' + valueNull(membro),

            beforeSend: function () {
            },
            success: function (unidades) {


                if (unidades !== '') {
                    $('#boxTable').html(unidades);
                } else {
                    pesquisaProgVazia();
                }
            }
        });
    });
});

function valueNull(parament) {

    if (parament == "" || parament == "NaN-NaN-NaN" || parament == "undefined-undefined-") {
        return "null";
    }
    return parament;
}

function date($date) {
    var from = $date.split("/");
    return from[2] + "-" + from[1] + "-" + from[0];

}
