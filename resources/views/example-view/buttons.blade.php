@extends('layouts.principal')

@section('title','Exemplo de Botões')
@section('title-form','Botões')

@section('breadcrumb')
    <li><a href="/">Home</a></li>
    <li><a>Forms</a></li>
    <li class="active"><strong>Botões</strong></li>
@endsection

@section('content')

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Botões</th>
            <th>class=""</th>
            <th>Descrição</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <button type="button" class="btn">Padrão</button>
            </td>
            <td><code>btn</code></td>
            <td>Botão padrão cinza</td>
        </tr>
        <tr>
            <td>
                <button type="button" class="btn btn-primary">Primário</button>
            </td>
            <td><code>btn btn-primary</code></td>
            <td>Provê peso extra visual e identifica a ação primária em uma coleção de botões</td>
        </tr>
        <tr>
            <td>
                <button type="button" class="btn btn-info">Informações</button>
            </td>
            <td><code>btn btn-info</code></td>
            <td>Usado como uma alternativa para os estilos padrões</td>
        </tr>
        <tr>
            <td>
                <button type="button" class="btn btn-success">Sucesso</button>
            </td>
            <td><code>btn btn-success</code></td>
            <td>Indica uma ação bem sucedida e positiva</td>
        </tr>
        <tr>
            <td>
                <button type="button" class="btn btn-warning">Aviso</button>
            </td>
            <td><code>btn btn-warning</code></td>
            <td>Indicação de cuidado deve ser feita com esta ação</td>
        </tr>
        <tr>
            <td>
                <button type="button" class="btn btn-danger">Perigo</button>
            </td>
            <td><code>btn btn-danger</code></td>
            <td>Indica uma ação potencialmente perigosa</td>
        </tr>
        <tr>
            <td>
                <button type="button" class="btn btn-inverse">Inverso</button>
            </td>
            <td><code>btn btn-inverse</code></td>
            <td>Botão alternativo cinza, não ligado a uma ação semântica ou uso</td>
        </tr>
        <tr>
            <td>
                <button type="button" class="btn btn-link">Link</button>
            </td>
            <td><code>btn btn-link</code></td>
            <td>Desenfatizar um botão por fazer parecer como link enquanto mantém o comportamento de botão</td>
        </tr>
        </tbody>
    </table>

@endsection