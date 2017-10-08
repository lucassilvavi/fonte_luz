$('#formPessoal').on("submit", function () {
    $("#btnSalvarPessoal").prop("disabled", true);
    submit('#formPessoal', function (validate) {
        $('#btnSalvarPessoal').attr('disabled', true);
        if ($.parseJSON(validate).operacao) {
            MsgSucessoPessoal();
        } else {
            $("#btnSalvarPessoal").prop("disabled", true);

        }
    });
});

function MsgSucessoPessoal() {
// Override global options
    toastr.success('Dados alterados com sucesso!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}
