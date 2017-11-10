<div>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">
                Pagamento por Período</a></li>
        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Pagamento Por Mês</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">
            <form method="POST" id="formUploadComprovante">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="row">
                    <div class="form-group col-md-5">
                        <label for="nome" class="control-label">* De Mês Contribuição: </label>
                        <select id="inputState" name="habilidade" class="form-control">
                            <option value="">1</option>
                        </select>
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="nome" class="control-label">* De Ano Contribuição: </label>
                        <select id="inputState" name="habilidade" class="form-control">
                            <option value="">1</option>
                        </select>
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="nome" class="control-label">* Até Mês Contribuição: </label>
                        <select id="inputState" name="habilidade" class="form-control">
                            <option value="">1</option>
                        </select>
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="nome" class="control-label">* Até Ano Contribuição: </label>
                        <select id="inputState" name="habilidade" class="form-control">
                            <option value="">1</option>
                        </select>
                        <small class="help-block"></small>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-5">
                        <label for="nome" class="control-label">* Data do Depósito: </label>
                        <input type="text" class="form-control" name="nome" value="">
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="nome" class="control-label">* Valor da Contribuição: </label>
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
                        <button class="btn btn-success" id="btnSalvarDocumento1" type="button">Salvar Documento</button>
                    </div>

                </div>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Arquivos</th>
                        <th>Excluir</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    </tr>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-6 col-md-offset-0 form-group">
                        <button type="button" class="btn btn-block btn-danger sair">Sair</button>
                    </div>
                    <div class="col-md-6 col-md-offset-0 form-group">
                        <button type="submit" class="btn btn-block btn-success" id="salvar">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
        <div role="tabpanel" class="tab-pane" id="profile">

            <div class="row">
                <div class="form-group col-md-5">
                    <label for="nome" class="control-label">* Mês Contribuição: </label>
                    <select id="inputState" name="habilidade" class="form-control">
                        <option value="">1</option>
                    </select>
                    <small class="help-block"></small>
                </div>
                <div class="form-group col-md-5">
                    <label for="nome" class="control-label">* Ano Contribuição: </label>
                    <select id="inputState" name="habilidade" class="form-control">
                        <option value="">1</option>
                    </select>
                    <small class="help-block"></small>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="nome" class="control-label">* Data do Depósito: </label>
                    <input type="text" class="form-control" name="nome" value="">
                    <small class="help-block"></small>
                </div>
                <div class="form-group col-md-5">
                    <label for="nome" class="control-label">*Valor da Contribuição: </label>
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
                    <button class="btn btn-success" id="btnSalvarDocumento" type="button">Salvar Documento</button>
                </div>

            </div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Arquivos</th>
                    <th>Excluir</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                </tr>
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-6 col-md-offset-0 form-group">
                    <button type="button" class="btn btn-block btn-danger sair" id="sair">Sair</button>
                </div>
                <div class="col-md-6 col-md-offset-0 form-group">
                    <button type="submit" class="btn btn-block btn-success" id="salvar">Salvar</button>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    $('.sair').on('click', function () {
        $('.modal').modal('hide');
    });
    $('.close').remove();
</script>
<script>
    $("#btnSalvarDocumento1").click(function () {
        alert('sdfs');
        $.ajax({
            url: '/adicionarComprovante',
            data: new FormData($("#formUploadComprovante")[0]),
            async: false,
            type: 'post',
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response[0]);
                $(".fotosGravadas").append("<p>" + response[0]['name'] + "</p>");
                $(".fotosGravadas").append("<input type='hidden' class='fotosAdd' name='idFotos[]' value=" + response[0]['fileID'] + "></input>");
            },
        });
    });

</script>
<script type="text/javascript" src="{{asset('assets/js/submit.js')}}"></script>
<script src="{{asset('assets/js/perfilUsuario/submitFormCadastroPerfil.js')}}"></script>