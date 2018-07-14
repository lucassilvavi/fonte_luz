$('#formEditarPerfil').on("submit", function (e) {
    $("#salvarPerfil").prop("disabled", true);
    submit(e,'#formEditarPerfil', function (validate) {
        $('#salvarPerfil').attr('disabled', true);
        if ($.parseJSON(validate).operacao) {
            MsgSucessoPerfil();
        } else {
            $("#salvarPerfil").prop("disabled", false);

        }
    });
});

function MsgSucessoPerfil() {
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
