$("#salvar").click(function (event) {
    event.preventDefault();
    let co_seq_turma = $("#co_seq_turma").val();
    let id = $("#id").val();

    $("#salvar").prop("disabled", true);
    $(".sair").prop("disabled", true);
    $.ajax({
        type: "get",
        url: "/saveMatricular/" + co_seq_turma+"/"+id,
        beforeSend: function () {
        },
        success: function (validate) {

            if ($.parseJSON(validate).operacao) {
                MsgSucessoTur();
                $(".sair").prop("disabled", false);

            } else {
                $("#salvar").prop("disabled", false);
                $(".sair").prop("disabled", false);
                MsgErroTur();
            }

        }
    });
});

function MsgSucessoTur() {
// Override global options
    toastr.success('Cadastrado com sucesso!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}


function MsgErroTur() {
    //// Override global options
    toastr.error('Aconteceu algum erro, por favor entre em contato com a equipe técnica" !', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "4500",
        positionClass: 'toast-top-center'
    });
}