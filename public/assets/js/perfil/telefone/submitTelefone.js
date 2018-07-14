$('#formTelefone').on("submit", function (e) {
    $("#submitTelefone").prop("disabled", true);
    submit(e,'#formTelefone', function (validate) {
        $('#btnSalvarPessoal').attr('disabled', true);
        if ($.parseJSON(validate).operacao) {
            MsgSucessoTelefone();
        } else {
            $("#submitTelefone").prop("disabled", true);

        }
    });
});

function MsgSucessoTelefone() {
// Override global options
    toastr.success('Telefone inserido com sucesso!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}
