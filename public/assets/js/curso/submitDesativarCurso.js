$("#salvar").click(function (event) {
    event.preventDefault();
    let co_seq_curso = $("#co_seq_curso").val();
    $("#salvar").prop("disabled", true);
    $(".sair").prop("disabled", true);
    $.ajax({
        type: "get",
        url: "/desativarCurso/" + co_seq_curso,
        beforeSend: function () {
        },
        success: function (validate) {

            if ($.parseJSON(validate).operacao) {
                MsgSucessoDesativarC();
                $("#salvar").prop("disabled", false);
                $(".sair").prop("disabled", false);

            } else {
                $("#salvar").prop("disabled", false);
                $(".sair").prop("disabled", false);
                MsgErroDesativar();
            }

        }
    });
});

function MsgSucessoDesativarC() {
// Override global options
    toastr.success('Curso desativado com sucesso!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}


function MsgErroDesativar() {
    //// Override global options
    toastr.error('Aconteceu algum erro, por favor entre em contato com a equipe técnica" !', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "4500",
        positionClass: 'toast-top-center'
    });
}