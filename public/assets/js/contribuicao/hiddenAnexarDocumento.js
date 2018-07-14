$(document).ready(function () {
    let tipoContribuicao = $(".tipoContribuicaoM");
    let tipoContribuicaoP = $(".tipoContribuicaoP");

    tipoContribuicao.change(function () {

        if (tipoContribuicao.val() === "2") {
            $('.anexarDocumentoMes').attr('hidden', true);
        } else {
            $('.anexarDocumentoMes').attr('hidden', false);
        }
    });

    tipoContribuicaoP.change(function () {

        if (tipoContribuicaoP.val() === "2") {
            $('.anexarDocumentoPeriodo').attr('hidden', true);
        } else {
            $('.anexarDocumentoPeriodo').attr('hidden', false);
        }
    });
});