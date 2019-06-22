$("#salvar").click(function (event) {
    event.preventDefault();
    let co_seq_financeiro = $("#co_seq_financeiro").val();
    $("#salvar").prop("disabled", true);
    $(".sair").prop("disabled", true);
    $.ajax({
        type: "get",
        url: "/saveEstornar/" + co_seq_financeiro,
        beforeSend: function () {
        },
        success: function (validate) {
            console.log(validate);
            if ($.parseJSON(validate).operacao) {
                MsgSucessoEstorno();
                $("#salvar").prop("disabled", false);
                $(".sair").prop("disabled", false);

            } else {
                $("#salvar").prop("disabled", false);
                $(".sair").prop("disabled", false);
                MsgErroEstorno();
            }

        }
    });
});

function MsgSucessoEstorno() {
// Override global options
    toastr.success('Entrada e Saída estornada com sucesso!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}


function MsgErroEstorno() {
    //// Override global options
    toastr.error('Aconteceu algum erro ao estornar, por favor entre em contato com a equipe técnica" !', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "4500",
        positionClass: 'toast-top-center'
    });
}