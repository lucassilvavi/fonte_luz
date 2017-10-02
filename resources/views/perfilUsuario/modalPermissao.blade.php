<div class="row">
    <div class="form-group col-lg-12">
        @foreach( $dados['co_permissoes'] as $permissoes)
        <label class="checkbox-inline">
            <input type="checkbox" id="inlineCheckbox1"
                   value="{{$permissoes['CO_SEQ_PERMISSOES']}}"> {{$permissoes['NO_PERMISSAO']}}
        </label>
            @endforeach
    </div>
</div>
