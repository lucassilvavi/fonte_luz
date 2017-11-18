$("#btnSalvarDocumento1").click(function (event) {
    event.preventDefault();
    var imagem = $("#selecionarArquivo").val();

    if (imagem == "") {
        MsgFaltaComprovante();
    } else {
        $.ajax({
            url: '/adicionarComprovante',
            data: new FormData($("#formComprovantePeriodo")[0]),
            async: false,
            type: 'post',
            processData: false,
            contentType: false,
            success: function (response) {
                $(".fotosGravadas").append("<tr> <td>" + response['nome'] + " <td>" +
                    "<button type='button' class='btn btn-block btn-danger excluir'" +
                    " onclick='excluir(" + response['comprovante'] + ")' value=" + response['comprovante'] + ">Excluir</button>" +
                    "<input type='hidden'  name='comprovante[]' value=" + response['comprovante'] + "></input></tr>");
            },
        });
    }

});
