<div>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">
                Pagamento por Período</a></li>
        {{--<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Pagamento Por Mês</a>--}}
        {{--</li>--}}
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">
            <form method="POST" action="{{action($dados['actionPorPeriodo'])}}" id="formComprovantePeriodo">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="row">
                    <div class="form-group col-md-5">
                        <label for="demesperiodo" class="control-label">* De Mês Contribuição: </label>
                        <select name="demesperiodo" class="form-control">
                            <option value=""></option>
                            @foreach($dados['meses'] as $k=> $mes)
                                <option value="{{($k)}}">{{$mes}}</option>
                            @endforeach
                        </select>
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="deanoperiodo" class="control-label">* De Ano Contribuição: </label>
                        <select name="deanoperiodo" class="form-control">
                            @foreach(  $dados['anos'] as $anos)
                                <option value="{{$anos}}">{{$anos}}</option>
                            @endforeach

                        </select>
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="atemesperiodo" class="control-label">* Até Mês Contribuição: </label>
                        <select name="atemesperiodo" class="form-control">
                            <option value=""></option>
                            @foreach($dados['meses'] as $k=> $mes)
                                <option value="{{($k)}}">{{$mes}}</option>
                            @endforeach

                        </select>
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="ateanoperiodo" class="control-label">* Até Ano Contribuição: </label>
                        <select name="ateanoperiodo" class="form-control">

                            @foreach(  $dados['anos'] as $anos)
                                <option value="{{$anos}}">{{$anos}}</option>
                            @endforeach
                        </select>
                        <small class="help-block"></small>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-5">
                        <label for="dtdepositoperiodo" class="control-label">* Data do Depósito: </label>
                        <input type="text" class="form-control date" name="dtdepositoperiodo" value="">
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="vlcontribuicaoperiodo" class="control-label">* Valor da Contribuição
                            Mensal: </label>
                        <input type="text" class="form-control money" name="vlcontribuicaoperiodo" value="">
                        <small class="help-block"></small>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label>Anexar Comprovante:</label>
                        <div class="input-group">
                              <span class="input-group-btn">
                                <span class="btn btn-primary"
                                      onclick="$(this).parent().find('input[type=file]').click();">Pesquisar</span>
                                <input name="image" id="selecionarArquivo"
                                       onchange="$(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());"
                                       style="display: none;" type="file" accept=".png, .jpg, .jpeg">
                              </span>
                            <span class="form-control"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <button class="btn btn-success" id="btnSalvarDocumento1" type="button">Salvar Documento</button>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Arquivos</th>
                        <th>Excluir</th>
                    </tr>
                    </thead>
                    <tbody class="fotosGravadas">
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-6 col-md-offset-0 form-group">
                        <button type="button" class="btn btn-block btn-danger sair">Sair</button>
                    </div>
                    <div class="col-md-6 col-md-offset-0 form-group">
                        <button type="submit" class="btn btn-block btn-success" id="salvarPorPeriodo">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>

    $('.sair').on('click', function () {
        $('.modal').modal('hide');
    });
    $('.close').remove();
</script>
<script src="{{asset('assets/js/mascaras/mascaras.js')}}"></script>
<script src="{{asset('assets/js/submit.js')}}"></script>
<script>
    $("#formComprovantePeriodo").on("submit", function () {
        $("#salvarPorPeriodo").prop("disabled", true);
        $(".sair").prop("disabled", true);
        submit('#formComprovantePeriodo', function (validate) {
            if (validate == false) {
                MsgFaltaComprovante();
                $("#salvarPorPeriodo").prop("disabled", false);
                $(".sair").prop("disabled", false);
            } else if (($.parseJSON(validate).operacao)) {
                MsgSucessoPorPeriodo();
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

    function MsgSucessoPorPeriodo() {
// Override global options
        toastr.success('Pagamento inserido com sucesso!', '', {
            closeButton: false,
            progressBar: true,
            timeOut: "2500",
            positionClass: 'toast-top-center'
        });
        setTimeout(function () {
            location.reload();
        }, 2500);
    }
</script>
<script src="{{asset('assets/js/home/cadastrarImagemPorPeriodo.js')}}"></script>
<script src="{{asset('assets/js/home/excluirComprovantePorPeriodo.js')}}"></script>


