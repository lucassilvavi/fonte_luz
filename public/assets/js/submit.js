$(document).ready(function() {
    $('input, select').change(function() {

        $(this).parent().removeClass('has-error');
        $(this).siblings('.help-block').empty();
    });
});
function submit(form, callback) {
    // $(":submit").prop("disabled", true);
    event.preventDefault();
    var action = $(form).attr("action");
    var dataForm = $(form).serialize();


    $.ajax({
        type: "POST",
        url: action,
        data: dataForm,
        beforeSend: function()
        {
            $('#load').html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw" style="color:blue;"></i>');
            $('#load').show();
        },
        success: function(data)
        {
            try {
                $('#load').html('Salvar');
                if (Object.values($.parseJSON(data))[0] !== true) {
                    $(":submit").prop("disabled", false);
                    error(data);
                    callback(false);
                } else {
                    callback(data);
                }
            } catch (e) {
                $(":submit").prop("disabled", false);
                console.log('O formato do retorno não é um Json: ' + data, '\n' + e);
                return false;
            }

        }
    });


}

function error(data)
{

    try {
        var obj = $.parseJSON(data);
        for (var i in obj) {

            var fieldName = Object.keys($.parseJSON(obj[i]
                    .replace(/[' ']/g, '_')));

            var mensageError = Object.values($.parseJSON(obj[i]));
            $('[name="' + fieldName + '"]').parent()
                    .addClass('has-error');

            $('[name="' + fieldName + '"]').siblings('.help-block')
                    .text(mensageError);
        }
    } catch (e) {
        $(":submit").prop("disabled", false);
        console.log('O formato do retorno não é um Json: ' + data, '\n' + e);
    }
    return false;
}

