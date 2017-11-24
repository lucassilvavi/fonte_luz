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
        <td><a href="{{ $dados['baixar'].$comprovante->co_seq_comprovante}}" target="_blank" >Baixar Comprovante</a> </td>
    </tr>
        @endforeach
    </tbody>
</table>
<hr>
<form>

</form>