$(".excluirFoto").click(function () {
    var co_seq_foto = $(this).val();
    $.ajax({
        type: "get",
        url: "/deletePhoto/"+co_seq_foto,
        beforeSend: function () {
        },
        success: function (data) {

            if (data == 'true'){
                sucessoExcluida();
            }else{
                erroExcluir();
            }

        }
    });
});
function sucessoExcluida() {
// Override global options
    toastr.success('Foto excluída com Sucesso!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}
function erroExcluir() {
// Override global options
    toastr.warning('Erro ao excluir a foto!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}