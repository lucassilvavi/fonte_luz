$('#formEditarPerfil').on("submit", function () {
    $("#salvarPerfil").prop("disabled", true);
    submit('#formEditarPerfil', function (validate) {
        $('#salvarPerfil').attr('disabled', true);
        if ($.parseJSON(validate).operacao) {
            MsgSucessoPessoal();
        } else {
            $("#salvarPerfil").prop("disabled", false);

        }
    });
});

function MsgSucessoPessoal() {
// Override global options
    toastr.success('Perfil alterado com sucesso!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}
