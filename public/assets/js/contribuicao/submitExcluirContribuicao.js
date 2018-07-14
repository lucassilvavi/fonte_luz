$("#salvar").click(function (event) {
    event.preventDefault();
    let co_seq_controle_contribuicao = $("#co_seq_controle_contribuicao").val();
    $("#salvar").prop("disabled", true);
    $(".sair").prop("disabled", true);
    $.ajax({
        type: "get",
        url: "/excluirContribuicao/" + co_seq_controle_contribuicao,
        beforeSend: function () {
        },
        success: function (dados) {

            if (dados == 'Confirmado') {
                MsgConfirmado();
                $("#salvar").prop("disabled", false);
                $(".sair").prop("disabled", false);
            } else if (($.parseJSON(dados).operacao)) {
                MsgSucessoExcluir();
            } else {
                MsgErro();
                $("#salvar").prop("disabled", false);
                $(".sair").prop("disabled", false);
            }
        }
    });
});

function MsgSucessoExcluir() {
// Override global options
    toastr.success('Contribuição excluido com sucesso!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}

function MsgConfirmado() {
    //// Override global options
    toastr.warning('Não é possivel excluir está contribuição, pois a mesma já foi confirmada!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "4500",
        positionClass: 'toast-top-center'
    });
}

function MsgErro() {
    //// Override global options
    toastr.error('Aconteceu algum erro ao excluir, por favor entre em contato com a equipe técnica" !', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "4500",
        positionClass: 'toast-top-center'
    });
}