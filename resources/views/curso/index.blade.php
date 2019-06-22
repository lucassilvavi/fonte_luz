@extends('layouts.principal')

@section('title','Cursos')
@section('title-form','Cursos')

@section('content')
    <div class="row">
        <table class="table table-borderless" id="tableCursos" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Ementa</th>
                <th>Dt. Cadastro</th>
                <th>Dt. Exclusão</th>
                <th>Ativo</th>
                <th>Opções</th>
            </tr>
            </thead>
            <tbody>
            @foreach($dados['cursos'] as $curso)
                <tr>
                    <td>{{$curso->no_curso}}</td>
                    <td>{{$curso->ds_ementa_curso}}</td>
                    <td>{{$dados['data']->formatarDataBR($curso->dt_cadastro_curso)}}</td>
                    <td>{{$curso->dt_exclusao_curso != null ? $dados['data']->formatarDataBR($curso->dt_exclusao_curso) :"Curso Ativo"}}</td>
                    <td>{{$curso->st_ativo === "S"?"Ativo":"Inativo"}}</td>
                    <td>
                        @if($curso->st_ativo === "N")
                            <button type="button" class="btn btn-xs btn-success btn-block ativar"
                                    value="{{$curso->co_seq_curso}}">Ativar
                            </button>
                        @endif
                        <button type="button" class="btn btn-xs btn-info btn-block editar"
                                value="{{$curso->co_seq_curso}}">Editar
                        </button>
                        @if($curso->st_ativo === "S")
                            <button type="button" class="btn btn-xs btn-danger btn-block desativar"
                                    value="{{$curso->co_seq_curso}}">Desativar
                            </button>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="modal-title"></h3>
                </div>
                <div class="modal-body" id="conteudoModal"></div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('assets/js/mascaras/mascaras.js')}}"></script>
    <script src="{{asset('assets/js/curso/modalCadCurso.js')}}"></script>
    <script src="{{asset('assets/js/curso/dataTable.js')}}"></script>
    <script src="{{asset('assets/js/curso/modalDesativar.js')}}"></script>
    <script src="{{asset('assets/js/curso/modalEditar.js')}}"></script>
    <script src="{{asset('assets/js/curso/modalAtivar.js')}}"></script>
@endsection
