$(".sim").click(function () {
    let co_seq_controle_contribuicao = $("#co_seq_controle_contribuicao").val();
    $.ajax({
        type: "get",
        url: "/tesouraria/saveReprovaContribuicao/" + co_seq_controle_contribuicao,
        beforeSend: function () {
        },
        success: function (dados) {

            if (dados.operacao) {
                $(".sim").prop("disabled", true);
                $(".sair").prop("disabled", true);
                MsgSucessoReprovada();
                let tds = document.querySelectorAll(".confirma_contribuicao");
                tds.forEach(function (td) {
                    if (td.value == dados.operacao) {
                        let tr = td.parentNode.parentNode;
                        tr.innerHTML = "";
                    }
                });
            }else{
                MsgErroEditar();
                $(".sim").prop("disabled", false);
                $(".sair").prop("disabled", false);
            }

        }
    });
});
function MsgSucessoReprovada() {
// Override global options
    toastr.success('Contribuição reprovada com sucesso!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        $('.modal').modal('hide');
    }, 2500);
}