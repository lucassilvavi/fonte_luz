$(document).ready(function () {
    let estado = $("#nacionalidade");
    let estadoGravado = $("#nacionalidade").val();

    if (estadoGravado === 26) {
        $('#endereco_naturalidade').attr('disabled', true);
    } else {
        $('#uf').attr('disabled', true);
        $('#cidade').attr('disabled', true);
    }
    estado.change(function () {

        if (estado.val() === "26") {
            $('#endereco_naturalidade').attr('disabled', true);
            $('#uf').attr('disabled', false);
            $('#cidade').attr('disabled', false);
        } else {
            $('#endereco_naturalidade').attr('disabled', false);
            $('#uf').attr('disabled', true);
            $('#cidade').attr('disabled', true);
        }
    });
});