@extends('layouts.principal')

@section('title','Ajuste da contribuição')
@section('title-form','Ajuste da contribuição')

@section('content')
    <form>
        <div class="form-group col-lg-4">
            <select class="form-control" name="idUsuario" id="idUsuario">
                <option value="">Usuários</option>
                @foreach($dados['usuarios'] as $usuario)
                    <option value="{{$usuario->id}}">{{$usuario->no_nome}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-3">
            <button type="button" class="btn btn-info btn-sm btn-block" id="pesquisarUsuario">Pesquisar
            </button>
        </div>
    </form>
@endsection
@section('scripts')

    <script>
        $("#pesquisarUsuario").click(function () {
            var idUsuario = $('#idUsuario').val();
            if(idUsuario === undefined || idUsuario == '' || idUsuario == 'undefined'){
                MsgErroSelecionar();
            }else{
                $(location).attr('href', '/contribuicao/'+idUsuario);
            }
        });
        function MsgErroSelecionar() {
            //// Override global options
            toastr.warning('Por favor selecione algum usuário!', '', {
                closeButton: false,
                progressBar: true,
                timeOut: "3500",
                positionClass: 'toast-top-center'
            });
        }

    </script>

@endsection
