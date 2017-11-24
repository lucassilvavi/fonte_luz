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
<form method="POST" action="" id="formComprovantePorMes">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="row">
        <div class="form-group col-md-4">
            <label>Anexar Comprovante:</label>
            <div class="input-group">
                              <span class="input-group-btn">
                                <span class="btn btn-primary"
                                      onclick="$(this).parent().find('input[type=file]').click();">Pesquisar</span>
                                <input name="image" id="selecionarArquivoMes"
                                       onchange="$(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());"
                                       style="display: none;" type="file" accept=".png, .jpg, .jpeg">
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
            <button type="submit" class="btn btn-block btn-success" id="salvarPorPeriodo">Salvar</button>
        </div>
    </div>
</form>
<script>
    $('.sair').on('click', function () {
        $('.modal').modal('hide');
    });
</script>
<script src="{{asset('assets/js/home/excluirEditarComprovante.js')}}"></script>
<script src="{{asset('assets/js/home/cadastrarImagemPorMes.js')}}"></script>
<script src="{{asset('assets/js/home/excluirComprovantePorPeriodo.js')}}"></script>
