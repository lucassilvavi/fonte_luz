$(document).ready(function() {
    $('.date').mask("00/00/0000", {placeholder: "__/__/____"});
    $('.time').mask('00:00:00', {placeholder: "00:00:00"});
    $('.date_time').mask('00/00/0000 00:00:00', {placeholder: "00/00/0000 00:00:00"});
    $('.cep').mask('00000-000', {placeholder: "00000-000"});
    $('.programatica').mask('AA.AAA.AAAA.AAAA.AAAA', {placeholder: "00.000.0000.0000.0000"});
    $('.phone_with_ddd').mask('(00) 0000-0000', {placeholder: "(00) 0000-0000"});
    $('.cpf').mask('000.000.000-00', {reverse: true, placeholder: "000.000.000-00"});
    $('.cnpj').mask('00.000.000/0000-00', {reverse: true, placeholder: "00.000.000/0000-00"});
    $('.money').mask('000.000.000.000.000,00', {reverse: true, placeholder: "00,00"});
    var SPMaskBehavior = function(val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
            spOptions = {
                onKeyPress: function(val, e, field, options) {
                    field.mask(SPMaskBehavior.apply({}, arguments), options);
                },
                placeholder: "(00) 00000-0000"
            };
    $('.phones').mask(SPMaskBehavior, spOptions);
});