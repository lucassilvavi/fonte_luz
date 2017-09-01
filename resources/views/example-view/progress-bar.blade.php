@extends('layouts.principal')

@section('title','Examplo - Progress bar')
@section('title-form','Barra de Progresso')

@section('breadcrumb')
    <li><a href="index.html">Home</a></li>
    <li><a>Forms</a></li>
    <li class="active"><strong>Barra de Progresso</strong></li>
@endsection

@section('content')
    <div class="progress">
        <div class="progress-bar" role="progressbar" aria-valuenow="70"
             aria-valuemin="0" aria-valuemax="100" style="width:70%">
            <span class="sr-only">70% Complete</span>
        </div>
    </div>

    <div class="progress">
        <div class="progress-bar" role="progressbar" aria-valuenow="50"
             aria-valuemin="0" aria-valuemax="100" style="width:50%">
            50%
        </div>
    </div>


    <div class="progress">
        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="25"
             aria-valuemin="0" aria-valuemax="100" style="width:25%">
            <span >25% Complete</span>
        </div>
    </div>
    <div class="progress">
        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="30"
             aria-valuemin="0" aria-valuemax="100" style="width:30%">
            <span>30% Complete</span>
        </div>
    </div>
    <div class="progress">
        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="35"
             aria-valuemin="0" aria-valuemax="100" style="width:35%">
            <span>35% Complete</span>
        </div>
    </div>
    <div class="progress">
        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40"
             aria-valuemin="0" aria-valuemax="100" style="width:40%">
            <span>40% Complete</span>
        </div>
    </div>



    <div class="progress">
        <div class="progress-bar progress-bar-success" role="progressbar" style="width:40%">
            Free Space
        </div>
        <div class="progress-bar progress-bar-warning" role="progressbar" style="width:10%">
            Warning
        </div>
        <div class="progress-bar progress-bar-danger" role="progressbar" style="width:50%">
            Danger
        </div>
    </div>
@endsection