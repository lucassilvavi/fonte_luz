$("#formDesmatricular").on("submit", function (e) {
    $("#salvar").prop("disabled", true);
    submit(e, '#formDesmatricular', function (validate) {

        if ($.parseJSON(validate).operacao) {
            MsgAlunoDesv();
        } else if($.parseJSON(validate).operacao === false){
            $("#salvar").prop("disabled", false);
            MsgErroDesv();
        }else{
            $("#salvar").prop("disabled", false);
        }
    });
});

function MsgAlunoDesv() {
// Override global options
    toastr.success('Curso desvinculado com sucesso!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}

function MsgErroDesv() {
// Override global options
    toastr.warning('Erro, por favor entre em contato a equipe técnica!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}

