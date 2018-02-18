<table class="table table-bordered ">
    <thead>
    <tr>
        <th>Arquivo</th>
        <th>Download</th>
        <th>Excluir</th>
    </tr>
    </thead>
    <tbody>
    @foreach( $dados['comprovantes'] as $comprovante)
        <tr>
            <td>{{$comprovante->co_seq_comprovante}}</td>
            <td><a href="{{ $dados['baixar'].$comprovante->co_seq_comprovante}}" target="_blank">Baixar Comprovante</a>
            </td>
            <td>
                <button type="button" class="btn btn-block btn-danger exluirComprovante"
                        value="{{$comprovante->co_seq_comprovante}}">Excluir
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<hr>
<form method="POST" action="{{action($dados['action'])}}" id="formComprovantePorMes">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="co_seq_controle_contribuicao" value="{{ $dados['co_seq_controle_contribuicao']}}">
    <div class="row">
        <div class="form-group col-md-4">
            <label>Anexar Comprovante:</label>
            <div class="input-group">
                              <span class="input-group-btn">
                                <span class="btn btn-primary"
                                      onclick="$(this).parent().find('input[type=file]').click();">Pesquisar</span>
                                <input name="image" id="selecionarArquivoMes"
                                       onchange="$(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());"
                                       style="display: none;" type="file" accept=".png, .jpg, .jpeg, .pdf">
                              </span>
                <span class="form-control"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <button class="btn btn-success" id="btnSalvarDocumentoMes" type="button">Salvar Documento</button>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Arquivos</th>
            <th>Excluir</th>
        </tr>
        </thead>
        <tbody class="fotosGravadasMes">
        </tbody>
    </table>
    <div class="row">
        <div class="col-md-6 col-md-offset-0 form-group">
            <button type="button" class="btn btn-block btn-danger sair">Sair</button>
        </div>
        <div class="col-md-6 col-md-offset-0 form-group">
            <button type="submit" class="btn btn-block btn-success" id="salvarMes">Salvar</button>
        </div>
    </div>
</form>
<script>
    $('.sair').on('click', function () {
        $('.modal').modal('hide');
    });
</script>
<script src="{{asset('assets/js/contribuicao/excluirEditarComprovante.js')}}"></script>
<script src="{{asset('assets/js/contribuicao/cadastrarImagemPorMes.js')}}"></script>
<script src="{{asset('assets/js/contribuicao/excluirComprovantePorPeriodo.js')}}"></script>
<script src="{{asset('assets/js/submit.js')}}"></script>
<script>
    $("#formComprovantePorMes").on("submit", function () {
        $("#salvarMes").prop("disabled", true);
        $(".sair").prop("disabled", true);
        $(".excluir").prop("disabled", true);
        $(".exluirComprovante").prop("disabled", true);
        submit('#formComprovantePorMes', function (validate) {
            if (validate == false) {
                MsgFaltaComprovante();
                $("#salvarMes").prop("disabled", false);
                $(".sair").prop("disabled", false);
                $(".excluir").prop("disabled", false);
                $(".exluirComprovante").prop("disabled", false);
            } else if (($.parseJSON(validate).operacao)) {
                MsgSucessoComprovante();
            }
        });
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

    function MsgSucessoComprovante() {
// Override global options
        toastr.success('Comprovante inserido com sucesso!', '', {
            closeButton: false,
            progressBar: true,
            timeOut: "2000",
            positionClass: 'toast-top-center'
        });
        setTimeout(function () {
            location.reload();
        }, 2000);
    }
</script>
