<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">
            Pagamento Por Mês</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
            Pagamento Por Período </a>
    </li>

</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
        <form method="POST" action="{{$dados['actionPorMes']}}" id="formComprovantePorMes">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="demes" class="control-label">* Mês Contribuição: </label>
                    <select name="demes" class="form-control">
                        <option value=""></option>
                        @foreach($dados['meses'] as $k=> $mes)
                            <option value="{{($k)}}">{{$mes}}</option>
                        @endforeach
                    </select>
                    <small class="help-block"></small>
                </div>
                <div class="form-group col-md-5">
                    <label for="anoMes" class="control-label">* Ano Contribuição: </label>
                    <select name="anoMes" class="form-control">
                        @foreach(  $dados['anos'] as $anos)
                            <option value="{{$anos}}">{{$anos}}</option>
                        @endforeach
                    </select>
                    <small class="help-block"></small>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="dtdepositomes" class="control-label">* Data do Depósito: </label>
                    <input type="text" class="form-control date" name="dtdepositomes" value="">
                    <small class="help-block"></small>
                </div>
                <div class="form-group col-md-5">
                    <label for="vlcontribuicaomes" class="control-label">* Valor da Contribuição
                        Mensal: </label>
                    <input type="text" class="form-control money" name="vlcontribuicaomes" value="">
                    <small class="help-block"></small>
                </div>
                <div class="form-group col-md-10">
                    <label for="tipoContribuicao" class="control-label">* Tipo da contribuição: </label>
                    <select name="tipoContribuicao" class="form-control">
                        <option value="1">Depósito Bancário</option>
                        <option value="2">Via Gaveta (na Fonte de Luz)</option>
                    </select>
                    <small class="help-block"></small>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label>Anexar Comprovante:</label>
                    <div class="input-group">
                               <span class="input-group-btn">
                                 <span class="btn btn-primary"
                                       onclick="$(this).parent().find('input[type=file]').click();">Pesquisar</span>
                                 <input name="image" id="selecionarArquivoMes"
                                        onchange="$(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());"
                                        style="display: none;" type="file" accept=".png, .jpg, .jpeg,.pdf">
                               </span>
                        <span class="form-control"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <button class="btn btn-success" id="btnSalvarDocumentoMes" type="button">Salvar Documento
                    </button>
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
                <tr>
                </tr>
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-6 col-md-offset-0 form-group">
                    <button type="button" class="btn btn-block btn-danger sair" id="sair">Sair</button>
                </div>
                <div class="col-md-6 col-md-offset-0 form-group">
                    <button type="submit" class="btn btn-block btn-success" id="salvarMes">Salvar</button>
                </div>
            </div>
        </form>
    </div>
    <div role="tabpanel" class="tab-pane" id="profile">
        <form method="POST" action="{{$dados['actionPorPeriodo']}}" id="formComprovantePeriodo">
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
                <div class="form-group col-md-10">
                    <label for="tipoContribuicao" class="control-label">* Tipo da contribuição: </label>
                    <select name="tipoContribuicao"   class="form-control">
                        <option value="1">Depósito Bancário</option>
                        <option value="2">Via Gaveta (na Fonte de Luz)</option>
                    </select>
                    <small class="help-block"></small>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label>Anexar Comprovante:</label>
                    <div class="input-group">
                              <span class="input-group-btn">
                                <span class="btn btn-primary"
                                      onclick="$(this).parent().find('input[type=file]').click();">Pesquisar</span>
                                <input name="image" id="selecionarArquivo"
                                       onchange="$(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());"
                                       style="display: none;" type="file" accept=".png, .jpg, .jpeg, .pdf">
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
<script>
    $('.sair').on('click', function () {
        $('.modal').modal('hide');
    });
    $('.close').remove();
</script>
<script src="{{asset('assets/js/mascaras/mascaras.js')}}"></script>
<script src="{{asset('assets/js/submit.js')}}"></script>
<script src="{{asset('assets/js/contribuicao/submitPagamentoPorPeriodo.js')}}"></script>
<script src="{{asset('assets/js/contribuicao/cadastrarImagemPorPeriodo.js')}}"></script>
<script src="{{asset('assets/js/contribuicao/excluirComprovantePorPeriodo.js')}}"></script>

<script src="{{asset('assets/js/contribuicao/cadastrarImagemPorMes.js')}}"></script>
<script src="{{asset('assets/js/contribuicao/submitPagamentoPorMes.js')}}"></script>

