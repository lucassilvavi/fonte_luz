$("#formTrabalho").on("submit", function() {
    $("#btnSubmitHabilidade").prop("disabled", true);
    submit('#formTrabalho', function(validate) {
        if ($.parseJSON(validate).operacao) {
            MsgSucessoTrabalho();
        }else {
            $("#btnSubmitHabilidade").prop("disabled", false);
        }
    });
});
function MsgSucessoTrabalho() {
// Override global options
    toastr.success('Habilidade inseridos com sucesso!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}

