@extends('layouts.principal')

@section('title','Página teste')
@section('title-form','Formulários')

@section('breadcrumb')
    <li>
        <a href="index.html">Home</a>
    </li>
    <li>
        <a>Forms</a>
    </li>
    <li class="active">
        <strong>Formulários</strong>
    </li>
@endsection

@section('content')

    <div class="row">
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3 class="dark-grey">Inputs</h3>
            <div class="form-group col-lg-12">
                <label>Nome do título</label>
                <input type="" name="" class="form-control" id="" value="">
            </div>
            <div class="form-group col-lg-6">
                <label>Senha</label>
                <input type="password" name="" class="form-control" id="" value="">
            </div>

            <div class="form-group col-lg-6">
                <label>Data</label>
                <div class="input-group date" id="datepicker-exemplo">
                    <input type="text" class="form-control"><span class="input-group-addon"><i class="fa fa-calendar"
                                                                                               aria-hidden="true"></i></span>
                </div>
            </div>

            <div class="form-group col-lg-6">
                <label>Email</label>
                <input type="" name="" class="form-control" id="" value="">
            </div>

            <div class="form-group col-lg-6">
                <label>Confirme o Email</label>
                <input type="" name="" class="form-control" id="" value="">
            </div>

            <div class="col-lg-6">
                <label>Múltiplos Radios</label>

                <div class="radio">
                    <label for="radios-0">
                        <input type="radio" name="radios" id="radios-0" value="1" checked="checked">
                        Opção 1
                    </label>
                </div>
                <div class="radio">
                    <label for="radios-1">
                        <input type="radio" name="radios" id="radios-1" value="2">
                        Opção 2
                    </label>
                </div>
            </div>
            <div class="col-lg-6">

                <label>Múltiplos Checkboxes </label>

                <div class="checkbox">
                    <label for="checkbox-0">
                        <input type="checkbox" name="checkboxs" id="checkbox-0" value="1" checked="checked">
                        Opção 1
                    </label>
                </div>
                <div class="checkbox">
                    <label for="checkbox-1">
                        <input type="checkbox" name="checkboxs" id="checkbox-1" value="2">
                        Opção 2
                    </label>
                </div>
            </div>
            <div class="col-lg-12">
                <label>Textarea</label>
                <textarea class="form-control" rows="3"></textarea>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="col-md-12">
                <h3 class="dark-grey">Inputs - class="col-md-6"</h3>
                <div class="form-group col-lg-12">
                    <label>Nome do título</label>
                    <input type="" name="" class="form-control" id="" value="">
                </div>
                <div class="form-group col-lg-6">
                    <label>Senha</label>
                    <input type="password" name="" class="form-control" id="" value="">
                </div>

                <div class="form-group col-lg-6">
                    <label>Confirme a Senha</label>
                    <input type="password" name="" class="form-control" id="" value="">
                </div>

                <div class="form-group col-lg-6">
                    <label>Email</label>
                    <input type="" name="" class="form-control" id="" value="">
                </div>

                <div class="form-group col-lg-6">
                    <label>Confirme o Email</label>
                    <input type="" name="" class="form-control" id="" value="">
                </div>

                <div class="col-lg-6">

                    <label>Múltiplos Radios</label>

                    <div class="radio">
                        <label for="radios-0">
                            <input type="radio" name="radios" id="radios-0" value="1" checked="checked">
                            Opção 1
                        </label>
                    </div>
                    <div class="radio">
                        <label for="radios-1">
                            <input type="radio" name="radios" id="radios-1" value="2">
                            Opção 2
                        </label>
                    </div>
                </div>
                <div class="col-lg-6">

                    <label>Múltiplos Checkboxes </label>

                    <div class="checkbox">
                        <label for="checkbox-0">
                            <input type="checkbox" name="checkboxs" id="checkbox-0" value="1" checked="checked">
                            Opção 1
                        </label>
                    </div>
                    <div class="checkbox">
                        <label for="checkbox-1">
                            <input type="checkbox" name="checkboxs" id="checkbox-1" value="2">
                            Opção 2
                        </label>
                    </div>
                </div>
                <div class="col-lg-12">
                    <label>Textarea</label>
                    <textarea class="form-control" rows="3"></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="col-md-12">
                <h3 class="dark-grey">Inputs - class="col-md-6"</h3>
                <div class="form-group col-lg-12">
                    <label>Nome do título</label>
                    <input type="" name="" class="form-control" id="" value="">
                </div>
                <div class="form-group col-lg-6">
                    <label>Senha</label>
                    <input type="password" name="" class="form-control" id="" value="">
                </div>

                <div class="form-group col-lg-6">
                    <label>Confirme a Senha</label>
                    <input type="password" name="" class="form-control" id="" value="">
                </div>

                <div class="form-group col-lg-6">
                    <label>Email</label>
                    <input type="" name="" class="form-control" id="" value="">
                </div>

                <div class="form-group col-lg-6">
                    <label>Confirme o Email</label>
                    <input type="" name="" class="form-control" id="" value="">
                </div>

                <div class="col-lg-6">

                    <label>Múltiplos Radios</label>

                    <div class="radio">
                        <label for="radios-0">
                            <input type="radio" name="radios" id="radios-0" value="1" checked="checked">
                            Opção 1
                        </label>
                    </div>
                    <div class="radio">
                        <label for="radios-1">
                            <input type="radio" name="radios" id="radios-1" value="2">
                            Opção 2
                        </label>
                    </div>
                </div>
                <div class="col-lg-6">

                    <label>Múltiplos Checkboxes </label>

                    <div class="checkbox">
                        <label for="checkbox-0">
                            <input type="checkbox" name="checkboxs" id="checkbox-0" value="1" checked="checked">
                            Opção 1
                        </label>
                    </div>
                    <div class="checkbox">
                        <label for="checkbox-1">
                            <input type="checkbox" name="checkboxs" id="checkbox-1" value="2">
                            Opção 2
                        </label>
                    </div>
                </div>
                <div class="col-lg-12">
                    <label>Textarea</label>
                    <textarea class="form-control" rows="3"></textarea>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <h3 class="dark-grey">Área de texto</h3>
            <div class="form-group col-lg-6">
                <textarea class="form-control" rows="3"></textarea>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <h3 class="dark-grey">Checkbox e radio</h3>
            <div class="form-group col-lg-6">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="">
                        Opção 1 checkbox texto
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="">
                        Opção 2 checkbox texto
                    </label>
                </div>

                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                        Opção 1 radio texto
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                        Opção 2 radio texto
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                        Opção 3 radio texto
                    </label>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <h3 class="dark-grey">Checkboxs e radios inline</h3>
            <div class="form-group col-lg-12">
                <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox1" value="option1"> 1
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox2" value="option2"> 2
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox3" value="option3"> 3
                </label>
            </div>
            <div class="form-group col-lg-12">
                <label class="radio-inline">
                    <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> 1
                </label>
                <label class="radio-inline">
                    <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> 2
                </label>
                <label class="radio-inline">
                    <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> 3
                </label>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <h3 class="dark-grey">Selects</h3>
            <div class="form-group col-lg-4">
                <select class="form-control">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="form-group col-lg-4">
                <select multiple class="form-control">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <h3 class="dark-grey">Inputs desabilitados</h3>
            <div class="form-group col-lg-6">
                <input type="text" id="disabledTextInput" class="form-control" placeholder="Input desabilitado aqui"
                       disabled>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <h3 class="dark-grey">Estados de validação</h3>
            <div class="form-group col-lg-6">
                <div class="form-group has-success">
                    <label class="control-label" for="inputSuccess">Input com sucesso</label>
                    <input type="text" class="form-control" id="campoValido">
                    <span class="help-block">
                      <strong></strong>
                    </span>
                </div>
                <div class="form-group has-warning">
                    <label class="control-label" for="inputWarning">Input com aviso
                    </label>
                    <input type="text" class="form-control" id="campoAdvertencia">
                    <span class="help-block">
                        Alguma coisa deu errado
                    </span>
                </div>
                <div class="form-group has-error">
                    <label class="control-label" for="inputError">Input com erro</label>
                    <input type="text" class="form-control" id="campoError">
                    <span class="help-block">
                        Por favor, corrija o erro
                    </span>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('assets/js/formularios.js')}}"></script>
@endsection