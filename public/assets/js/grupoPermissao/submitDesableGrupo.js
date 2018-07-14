$("#formModalDesableGrupo").on("submit", function (e) {
    $("#salvar").prop("disabled", true);
    $("#sair").prop("disabled", true);
    submit(e,'#formModalDesableGrupo', function (validate) {

        if ($.parseJSON(validate).operacao) {
            MsgDesableGrupo();
        }else if (validate == false){
            $("#salvar").prop("disabled", false);
            $("#sair").prop("disabled", false);
            MsgErroPossuiPermissao();
        }
    });
});

function MsgDesableGrupo() {
// Override global options
    toastr.success('Grupo excluído com sucesso!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}

function MsgErroPossuiPermissao() {
// Override global options
    toastr.warning('Não é possivel excluir este grupo, pois exitem permissões vinculadas a ele!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2900",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2900);
}