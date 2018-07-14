$(".fotoExcluida").click(function () {
    let co_seq_foto = $(this).val();
    let usuario = $('#usuario').val();
    $.ajax({
        type: "get",
        url: "/changePhoto/"+co_seq_foto+'/'+usuario,
        beforeSend: function () {
        },
        success: function (data) {
            if (data == 'true'){
                sucessoAuterar();
            }else{
                erroAuterar();
            }

        }
    });
});
function sucessoAuterar() {
// Override global options

    toastr.success('Foto Alterada com Sucesso!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);


}
function erroAuterar() {
// Override global options
    toastr.warning('Erro ao altera a foto!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}