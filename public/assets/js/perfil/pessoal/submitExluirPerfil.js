$("#salvar").click(function (event) {

    event.preventDefault();

    let idUsuario = $("#idUsuario").val();

    $("#salvar").prop("disabled", true);
    $(".sair").prop("disabled", true);

    $.ajax({
        type: "get",
        url: "/exluirPerfil/" + idUsuario,
        beforeSend: function () {
        },
        success: function (validate) {

            if ($.parseJSON(validate).operacao) {
                MsgSucessoExcluir();
                $("#salvar").prop("disabled", false);
                $(".sair").prop("disabled", false);

            } else {
                $("#salvar").prop("disabled", false);
                $(".sair").prop("disabled", false);
                MsgErroExcluirPerfil();
            }

        }
    });
});

function MsgSucessoExcluir() {
// Override global options
    toastr.success('O seu perfil foi excluido com sucesso!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        document.getElementById('logout-form').submit();
    }, 2500);
}


function MsgErroExcluirPerfil() {
    //// Override global options
    toastr.error('Aconteceu algum erro, por favor entre em contato com a equipe técnica" !', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "4500",
        positionClass: 'toast-top-center'
    });
}
