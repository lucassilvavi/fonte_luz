$("#btnSalvarDocumentoMes").click(function (event) {
    event.preventDefault();
    var imagem = $("#selecionarArquivoMes").val();
    if (imagem == "") {
        MsgFaltaComprovante();
    }
    else {
        $.ajax({
            url: '/adicionarComprovante',
            data: new FormData($("#formComprovantePorMes")[0]),
            async: false,
            type: 'post',
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);
                $(".fotosGravadasMes").append("<tr> <td>" + response['nome'] + " <td>" +
                    "<button type='button' class='btn btn-block btn-danger excluir'" +
                    " onclick='excluir(" + response['comprovante'] + ")' value=" + response['comprovante'] + ">Excluir</button>" +
                    "<input type='hidden'  name='comprovante[]' value=" + response['comprovante'] + "></input></tr>");
            },
        });
    }
});
function MsgFaltaComprovante() {
    //// Override global options
    toastr.warning('Por favor Anexo um comprovante!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "3500",
        positionClass: 'toast-top-center'
    });
}
