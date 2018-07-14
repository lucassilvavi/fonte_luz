$('#formPessoal').on("submit", function (e) {
    $("#btnSalvarPessoal").prop("disabled", true);
    submit(e,'#formPessoal', function (validate) {
        $('#btnSalvarPessoal').attr('disabled', true);
        if ($.parseJSON(validate).operacao) {
            MsgSucessoPessoal();
        } else {
            $("#btnSalvarPessoal").prop("disabled", false);

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
