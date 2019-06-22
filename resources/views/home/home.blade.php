@extends('layouts.principal')
@section('title','Dashboard')
@section('content')
    <h1>Bem Vindo ao Sistema do Fonte Luz</h1>
    <br/>
    <h3>Cursos Matriculados</h3>
    @forelse( $dados['matriculados'] as $matriculados)
        <div class="alert alert-success container-fluid">
            <div class="row-fluid">
                <strong>{{$matriculados->no_curso}}</strong>
            </div>
            <div class="row-fluid">
                <div class="col col-lg-11">
                    <div class="row">
                        {{$matriculados->ds_ementa_curso}}
                    </div>
                </div>
                <div class="col col-lg-1">
                    <div class="row">
                        <button type="button" class="btn btn-xs btn-danger desmatricular"
                                value="{{$matriculados->co_seq_turma_usuario}}">
                            Desmatricular
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-warning">
            <strong>Não Possui!</strong>.
        </div>
    @endforelse


    <h3>Cursos Abertos</h3>
    @forelse( $dados['abertos'] as $abertos)

        <div class="alert alert-info container-fluid">
            <div class="row-fluid">
                <strong>{{$abertos->no_curso}}</strong>
            </div>
            <div class="row-fluid">
                <div class="col col-lg-11">
                    <div class="row">
                        {{$abertos->ds_ementa_curso}}
                    </div>
                </div>
                <div class="col col-lg-1">
                    <div class="row">
                        <button type="button" class="btn btn-xs btn-default matricular"
                                value="{{$abertos->co_seq_turma}}">
                            Matricular
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-warning">
            <strong>Não Possui!</strong>.
        </div>
    @endforelse
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
    <script src="{{asset('assets/js/home/modalDesmatricular.js')}}"></script>
    <script src="{{asset('assets/js/home/modalMatricular.js')}}"></script>
@endsection

