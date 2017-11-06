<form method="POST" id="formPerfilUsuario">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="row">
        <div class="form-group col-md-4">
            <label for="nome" class="control-label">* Mês Contribuição: </label>
            <select id="inputState" name="habilidade" class="form-control">
                <option value="">1</option>
            </select>
            <small class="help-block"></small>
        </div>
        <div class="form-group col-md-4">
            <label for="nome" class="control-label">* Ano Contribuição: </label>
            <select id="inputState" name="habilidade" class="form-control">
                <option value="">1</option>
            </select>
            <small class="help-block"></small>
        </div>
        <div class="form-group col-md-4">
            <label for="nome" class="control-label">* Valor Contribuição: </label>
            <input type="text" class="form-control" name="nome" value="">
            <small class="help-block"></small>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-5">
            <label for="nome" class="control-label">* Data de Pagamento: </label>
            <input type="text" class="form-control" name="nome" value="">
            <small class="help-block"></small>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <label>Anexar Comprovante:</label>
            <div class="input-group">
                              <span class="input-group-btn">
                                <span class="btn btn-primary"
                                      onclick="$(this).parent().find('input[type=file]').click();">Pesquisar</span>
                                <input name="image"
                                       onchange="$(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());"
                                       style="display: none;" type="file" accept=".png, .jpg, .jpeg">
                              </span>
                <span class="form-control"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <button class="btn btn-success upload-image" id="btnSalvar" type="button">Salvar Documento</button>
        </div>

    </div>

    <div class="form-group">
        <label for="descricao" class="control-label">* Descrição:</label><span class=""></span>
        <textarea type="text" class="form-control" name="descricao" value=""></textarea>
        <small class="help-block"></small>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-0 form-group">
            <button type="button" class="btn btn-block btn-danger" id="sair">Sair</button>
        </div>
        <div class="col-md-6 col-md-offset-0 form-group">
            <button type="submit" class="btn btn-block btn-success" id="salvar">Salvar</button>
        </div>
    </div>
</form>
<script>
    $('#sair').on('click', function () {
        $('.modal').modal('hide');
    });
</script>
<script type="text/javascript" src="{{asset('assets/js/submit.js')}}"></script>
<script src="{{asset('assets/js/perfilUsuario/submitFormCadastroPerfil.js')}}"></script>