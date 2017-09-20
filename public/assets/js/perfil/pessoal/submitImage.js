// $(document).ready(function () {
//
//     $("body").on("click", ".upload-image", function (e) {
//         $(this).parents("form").ajaxForm(options);
//     });
//     var options = {
//         complete: function (response) {
//             if ($.isEmptyObject(response.responseJSON.error)) {
//                 console.log(response);
//                 $("input[name='title']").val('');
//                 $(".alert-success").show();
//             } else {
//                 console.log(response);
//                 printErrorMsg(response.responseJSON.error);
//             }
//         }
//     };
//
//     function printErrorMsg(msg) {
//         $(".print-error-msg").find("ul").html('');
//         $(".print-error-msg").css('display', 'block');
//         $.each(msg, function (key, value) {
//             $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
//         });
//     }
// });
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

            if (response == 'true') {
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
