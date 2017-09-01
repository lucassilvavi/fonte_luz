@extends('layouts.principal')

@section('title','Página teste')
@section('title-form','Máscaras para campos')

@section('breadcrumb')
    <li>
        <a href="index.html">Home</a>
    </li>
    <li>
        <a>Forms</a>
    </li>
    <li class="active">
        <strong>Máscaras</strong>
    </li>
@endsection

@section('content')

    <div class="row">
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group col-lg-6">
                <label>Data</label>
                <input type="text" name="" class="form-control" id="date" value="">
            </div>
            <div class="form-group col-lg-6">
                <label>Telefone</label>
                <input type="text" name="" class="form-control" id="phone" value="">
            </div>
            <div class="form-group col-lg-6">
                <label>Hora</label>
                <input type="text" name="" class="form-control" id="time" value="">
            </div>
            <div class="form-group col-lg-6">
                <label>Telefone com código de área</label>
                <input type="text" name="" class="form-control" id="phone_with_ddd" value="">
            </div>
            <div class="form-group col-lg-6">
                <label>Data & Hora</label>
                <input type="text" name="" class="form-control" id="date_time" value="">
            </div>
            <div class="form-group col-lg-6">
                <label>CEP</label>
                <input type="text" name="" class="form-control" id="cep" value="">
            </div>
            <div class="form-group col-lg-6">
                <label>Telefone 9 dígitos</label>
                <input type="text" name="" class="form-control" id="sp_celphones" value="">
            </div>
            <div class="form-group col-lg-6">
                <label>CPF</label>
                <input type="text" name="" class="form-control" id="cpf" value="">
            </div>
            <div class="form-group col-lg-6">
                <label>CNPJ</label>
                <input type="text" name="" class="form-control" id="cnpj" value="">
            </div>
            <div class="form-group col-lg-6">
                <label>Dinheiro</label>
                <input type="text" name="" class="form-control" id="money" value="">
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#date').mask("00/00/0000", {placeholder: "__/__/____"});
            $('#time').mask('00:00:00', {placeholder: "00:00:00"});
            $('#date_time').mask('00/00/0000 00:00:00', {placeholder: "00/00/0000 00:00:00"});
            $('#cep').mask('00000-000', {placeholder: "00000-000"});
            $('#phone').mask('0000-0000', {placeholder: "0000-0000"});
            $('#phone_with_ddd').mask('(00) 0000-0000', {placeholder: "(00) 0000-0000"});
            $('#cpf').mask('000.000.000-00', {reverse: true, placeholder: "000.000.000-00"});
            $('#cnpj').mask('00.000.000/0000-00', {reverse: true, placeholder: "00.000.000/0000-00"});
            $('#money').mask('000.000.000.000.000,00', {reverse: true, placeholder: "00,00"});
            var SPMaskBehavior = function (val) {
                        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                    },
                    spOptions = {
                        onKeyPress: function (val, e, field, options) {
                            field.mask(SPMaskBehavior.apply({}, arguments), options);
                        },
                        placeholder: "(00) 00000-0000"
                    };

            $('#sp_celphones').mask(SPMaskBehavior, spOptions);
        });
    </script>
@endsection