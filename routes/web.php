<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//rotas padrão do laravel
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

//perfil dados Pessoais

Route::get('/getCidade/{co_uf}', 'Perfil\CidadeController@getCidadeWithUf');

Route::get('/perfil', 'Perfil\MembroController@index');

Route::post('/savePhoto', 'Perfil\FotosController@savePhoto');

Route::get('/changePhoto/{co_seq_foto}', 'Perfil\FotosController@changePhoto');

Route::post('/editarPessoal', 'Perfil\PessoalController@editarPessoal');

Route::get('/deletePhoto/{co_seq_foto}', 'Perfil\FotosController@deletePhoto');

Route::get('/formDesableHabilidade/{co_seq_usuario_profissao}', 'Perfil\TrabalhoController@formDesableHabilidade');

Route::post('/desableHabilidade', 'Perfil\TrabalhoController@desableHabilidade');

Route::post('/cadastrarTrabalho', 'Perfil\TrabalhoController@cadastrarTrabalho');

Route::post('/cadastrarTelefone', 'Perfil\TelefoneController@cadastrarTelefone');

Route::get('/formDesableTelefone/{co_seq_telefone}', 'Perfil\TelefoneController@formDesableTelefone');

Route::post('/desableTelefone', 'Perfil\TelefoneController@desableTelefone');

//rotas do perfil do nivel de acesso

Route::get('/perfilUsuario', 'PerfilUsuario\PerfilController@index');

Route::post('/savePerfil', 'PerfilUsuario\PerfilController@savePerfil');

Route::get('/formPerfil/{action}', 'PerfilUsuario\PerfilController@formPerfil');

Route::get('/modalPerfilPermissao/{co_perfil}', 'PerfilUsuario\PerfilController@modalPerfilPermissao');

Route::post('/savePerfilPermissao', 'PerfilUsuario\PerfilController@savePerfilPermissao');

//rotas do permissões do nivel de acesso

Route::get('/permissoes', 'Permissoes\PermissaoController@index');

Route::get('/formPermissao/{action}', 'Permissoes\PermissaoController@formPerfil');

Route::post('/savePermissao', 'Permissoes\PermissaoController@savePermissao');

Route::get('/modalDetalhePermissao/{co_permissao}', 'Permissoes\PermissaoController@modalDetalhePermissao');

//rotas do grupo do nivel de acesso

Route::get('/grupoPermissao', 'GrupoPermissao\GrupoPermissaoController@index');

Route::get('/formGrupoPermissao', 'GrupoPermissao\GrupoPermissaoController@formGrupoPermissao');

Route::post('/saveGrupoPermissao', 'GrupoPermissao\GrupoPermissaoController@saveGrupoPermissao');

Route::get('/modalGrupoPermissao/{co_seq_grupo_permissoes}', 'GrupoPermissao\GrupoPermissaoController@modalGrupoPermissao');

Route::get('/formDesableGrupo/{co_seq_grupo_permissoes}', 'GrupoPermissao\GrupoPermissaoController@formDesableGrupo');

Route::post('/saveDesableGrupo', 'GrupoPermissao\GrupoPermissaoController@saveDesableGrupo');


Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});


Route::get('/tables', function () {
    return view('example-view.tables');
});

Route::get('/calendario', function () {
    return view('example-view.calendario');
});

Route::get('/inputs', function () {
    return view('example-view.inputs');
});

Route::get('/mascaras', function () {
    return view('example-view.mascaras');
});

Route::get('/icones', function () {
    return view('example-view.icons');
});

Route::get('/notification', function () {

    Toastr::success('Messages in here', 'Title', ["positionClass" => "toast-top-center"]);
    Toastr::info('Messages in here', 'Title', ["positionClass" => "toast-top-center"]);
    Toastr::warning('Messages in here', 'Title', ["positionClass" => "toast-top-center"]);
    Toastr::error('Messages in here', 'Title', ["positionClass" => "toast-top-center"]);

    return view('example-view.notification');
});

Route::get('/sessao', function () {
    return Session::flash('status', 'Task was successful!');
});

Route::get('/buttons', function () {
    return view('example-view.buttons');
});

Route::get('/modals', function () {
    return view('example-view.modals');
});

Route::get('/tabs', function () {
    return view('example-view.tabs');
});

Route::get('/progress-bar', function () {
    return view('example-view.progress-bar');
});
//
//Route::get('/login', function () {
//    return view('example-view.login');
//});


/* CHART.JS */
Route::get('/charts-js', function () {
    return view('example-view.charts-js');
});

/* Google Charts */
Route::get('/google-chart', function () {
    return view('example-view.google-chart');
});