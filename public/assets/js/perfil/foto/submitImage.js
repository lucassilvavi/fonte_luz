$("#btnSalvar").click(function () {
    $("#btnSalvar").prop("disabled", true);
    $.ajax({
        url: '/savePhoto',
        data: new FormData($("#salvarImage")[0]),
        async: false,
        type: 'post',
        processData: false,
        contentType: false,
        success: function (response) {
            console.log(response === 'true');
            if (response === 'true') {
                sucessoFoto();
            }
            else if (response == 'image and title') {
                faltaAnexar();
                $("#btnSalvar").prop("disabled", false);
            }
            else if (response == 'image') {
                faltaImage();
                $("#btnSalvar").prop("disabled", false);
            }
            else if (response == 'title') {
                faltaTitulo();
                $("#btnSalvar").prop("disabled", false);
            }
        },
    });
});

function sucessoFoto() {
// Override global options
    toastr.success('Foto Anexada com Sucesso!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}

function faltaAnexar() {
// Override global options
    toastr.warning('Por favor Anexe um Imagem e insira um Titulo para ela!', '', {
        closeButton: false,
        progressBar: true,
        positionClass: 'toast-top-center'
    });
}

function faltaImage() {
// Override global options
    toastr.warning('Por favor Anexe um Imagem!', '', {
        closeButton: false,
        progressBar: true,
        positionClass: 'toast-top-center'
    });

}

function faltaTitulo() {
// Override global options
    toastr.warning('Por favor Anexe um Titulo para a Imagem!', '', {
        closeButton: false,
        progressBar: true,
        positionClass: 'toast-top-center'
    });
}
