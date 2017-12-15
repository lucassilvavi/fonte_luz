<table class="table table-bordered ">
    <thead>
    <tr>
        <th>Arquivo</th>
        <th>Download</th>
    </tr>
    </thead>
    <tbody>
    @foreach( $dados['comprovantes'] as $comprovante)
        <tr>
            <td>{{$comprovante->co_seq_comprovante}}</td>
            <td><a href="{{ $dados['baixar'].$comprovante->co_seq_comprovante}}" target="_blank">Baixar Comprovante</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="row">
    <div class="col-md-12 col-md-offset-0 form-group">
        <button type="button" class="btn btn-block btn-danger sair" id="sair">Sair</button>
    </div>
</div>
<script>
    $('.sair').on('click', function () {
        $('.modal').modal('hide');
    });
</script>