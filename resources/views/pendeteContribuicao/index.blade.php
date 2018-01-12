@extends('layouts.principal')

@section('title','Pendete de Contribuição')
@section('title-form','Pendete de Contribuição')

@section('content')
    <div class="container">
        <div class="form-group col-md-2">
            <label for="periodeDe" class="control-label">* Periodo De: </label>
            <input type="text" id="periodeDe" class="form-control date" name="periodeDe" value="">
            <small class="help-block"></small>
        </div>
        <div class="form-group col-md-2">
            <label for="periodeAte" class="control-label">* Até: </label>
            <input type="text" id="periodeAte" class="form-control date" name="periodeAte" value="">
            <small class="help-block"></small>
        </div>
        <div class="form-group col-md-4">
            <label for="membro" class="control-label">Membros: </label>
            <select name="membro" id="membro" class="form-control">
                <option value=""></option>
                @foreach( $dados['usuarios'] as $usuario)
                    <option value="{{$usuario->id}}">{{$usuario->no_nome}}</option>
                @endforeach
            </select>
            <small class="help-block"></small>
        </div>
        <div class="form-group col-md-4">
            <label  class="control-label"></label>
            <button type="button" id="pesquisar" class="btn btn-info btn-block">Pesquisar</button>
        </div>
    </div>
    <div class="row">
        <div id="boxTable">

        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('assets/js/mascaras/mascaras.js')}}"></script>
    <script>
        $(document).ready(function () {
            $("#pesquisar").click(function () {
                var periodeDe = $('#periodeDe').val();
                var periodeAte = $('#periodeAte').val();
                var membro = $('#membro').val();
                $.ajax({
                    type: "get",
                    url: "/getTipoContribuicaoGaveta/"+ valueNull(date(periodeDe)) + '/' + valueNull(date(periodeAte)) + '/' + valueNull(membro),
                    beforeSend: function () {
                    },
                    success: function (unidades) {
                        console.log(unidades);
                        if (unidades !== '') {
                            $('#boxTable').html(unidades);
                        } else {
                            pesquisaProgVazia();
                        }
                    }
                });
            });
        });

        function valueNull(parament) {

            if (parament == "" || parament == "NaN-NaN-NaN" || parament == "undefined-undefined-") {
                return "null";
            }
            return parament;
        }

        function date($date) {
            var from = $date.split("/");
            return from[2] + "-" + from[1] + "-" + from[0];

        }
    </script>
@endsection
