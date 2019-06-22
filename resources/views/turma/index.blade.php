@extends('layouts.principal')

@section('title','Turma')
@section('title-form','Turma')

@section('content')
    <div class="row">
        <div class="container">
            <div class="form-group col-md-2">
                <label for="nt_turma" class="control-label">Situação do Curso: </label>
                <select name="nt_turma" id="nt_turma" class="form-control">
                    <option value="andamento">Em Andamento</option>
                    <option value="encerrado">Encerrado</option>
                </select>
                <small class="help-block"></small>
            </div>
            <div class="form-group col-md-2">
                <label for="tp_curso" class="control-label">Tipo de Curso: </label>
                <select name="tp_curso" id="tp_curso" class="form-control">
                    @foreach($dados['cursos'] as $curso)
                        <option value="{{$curso->co_seq_curso}}">{{$curso->no_curso}}</option>
                    @endforeach
                </select>
                <small class="help-block"></small>
            </div>
            <div class="form-group col-md-2">
                <label class="control-label"></label>
                <button type="button" id="pesquisar" class="btn btn-info btn-block">Pesquisar</button>
            </div>
            <div class="form-group col-md-2">
                <label class="control-label"></label>
                <button type="button" class="btn btn-primary btn-block cadastrarTurma">Cadastrar Turma</button>
            </div>
        </div>
    </div>
    <div class="row">
        <table class="table table-borderless table-condensed" id="tableTurma" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th scope="col">Curso</th>
                <th scope="col">Nº Vagas</th>
                <th scope="col">Dt. Abertura</th>
                <th scope="col">Dt. Fechamento</th>
                <th scope="col">Opções</th>
            </tr>
            </thead>
            <tbody>
            @foreach($dados['turmas'] as $turma)
                <tr>
                    <td>{{$turma->curso[0]->no_curso}}</td>
                    <td>{{$turma->nu_vagas}}</td>
                    <td>{{$dados['data']->formatarDataBR($turma->dt_abertura_turma)}}</td>
                    <td>{{$dados['data']->formatarDataBR($turma->dt_fechamento_turma)}}</td>
                    <td>
                        <button type="button" class="btn btn-block btn-info btn-xs aluno"
                                value="{{$turma->co_seq_turma}}">Matricular
                        </button>
                        <button type="button" class="btn btn-block btn-danger btn-xs desativar"
                                value="{{$turma->co_seq_turma}}">Desativar
                        </button>
                        <button type="button" class="btn btn-block btn-success btn-xs matriculados"
                                value="{{$turma->co_seq_turma}}">Matrículados
                        </button>
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
    <script src="{{asset('assets/js/turma/modalCadastrar.js')}}"></script>
    <script src="{{asset('assets/js/turma/pesquisar.js')}}"></script>
    <script src="{{asset('assets/js/turma/dataTable.js')}}"></script>
    <script src="{{asset('assets/js/turma/modalAlunos.js')}}"></script>
    <script src="{{asset('assets/js/turma/modalDesativar.js')}}"></script>
    <script src="{{asset('assets/js/turma/modalMatriculados.js')}}"></script>

@endsection
