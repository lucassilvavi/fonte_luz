$("#aprovarSelecionados").on('click', function () {
    var form = new Array();
    $("input[name='controle_contribuicao[]']:checked").each(function () {
        form.push($(this).val());
    });
    if (form == "") {
        MsgFaltaSelecionarContribuicao()
    } else {
        $.ajax({
            type: "post",
            data: {"form": form, "_token": "{{ csrf_token() }}"},
            url: "/tesouraria/saveAprovarSelecionados",

            success: function (dados) {
                if (dados.operacao = true) {
                    MsgSucessoAprovacaoSelecionados();
                } else {
                    MsgErroAprovacaoSelecionados();
                }
            }
        });
    }
});

function MsgFaltaSelecionarContribuicao() {
    //// Override global options
    toastr.warning('Por favor selecione uma ou mais contribuições!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "3500",
        positionClass: 'toast-top-center'
    });
}

function MsgErroAprovacaoSelecionados() {
    //// Override global options
    toastr.error('Aconteceu um erro ao salvar a aprovação, por favor entre em contato com a equipe técnica!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "3500",
        positionClass: 'toast-top-center'
    });
}

function MsgSucessoAprovacaoSelecionados() {
// Override global options
    toastr.success('Contribuições Aprovadas com sucesso!', '', {
        closeButton: false,
        progressBar: true,
        timeOut: "2500",
        positionClass: 'toast-top-center'
    });
    setTimeout(function () {
        location.reload();
    }, 2500);
}