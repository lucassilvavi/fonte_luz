$(document).ready(function () {
    $(".exluirComprovante").on('click', function () {
        let co_seq_comprovante = $(this).val();
        $.ajax({
            type: "get",
            url: "/desativarComprovante/" + co_seq_comprovante,
            beforeSend: function () {
            },
            success: function (data) {
                if (data == "Aprovado") {
                    MsgAnalisado();
                } else if (($.parseJSON(data).operacao)) {
                    let tds = document.querySelectorAll(".exluirComprovante");
                    tds.forEach(function (td) {
                        if (td.value == co_seq_comprovante) {
                            let tr = td.parentNode;
                            tr.parentNode.innerHTML = "";
                        }
                    });
                } else {
                    MsgErroExcluir();
                }
            }
        });

    });
});

function MsgErroExcluir() {
    //// Override global options
    toastr.warning('Erro ao excluir comprovante, por favor entre em contato com a equipe técnica!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "3500",
        positionClass: 'toast-top-center'
    });
}

function MsgAnalisado() {
    //// Override global options
    toastr.warning('Não é possivel excluir este documentos, pois já está analisado!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "3500",
        positionClass: 'toast-top-center'
    });
}