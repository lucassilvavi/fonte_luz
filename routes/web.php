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
Auth::routes();
//dasboard
Route::get('/', 'Home\HomeController@index');


//rotas do inicio do sistema
Route::get('/contribuicao/{co_usuario?}', 'Contribuicao\HomeController@index');

Route::get('/formContribuicao', 'Contribuicao\ContribuicaoController@formContribuicao');

Route::get('/formEditarContribuicao/{co_seq_controle_contribuicao}', 'Contribuicao\ContribuicaoController@formEditarContribuicao');

Route::get('/formEditaComprovante/{co_seq_controle_contribuicao}', 'Contribuicao\ComprovanteController@formEditaComprovante');

Route::post('/adicionarComprovante', 'Contribuicao\ComprovanteController@adicionarComprovante');

Route::get('/formExcluirContribuicao/{co_seq_controle_contribuicao}', 'Contribuicao\ContribuicaoController@formExcluirContribuicao');

Route::get('/excluirContribuicao/{co_seq_controle_contribuicao}', 'Contribuicao\ContribuicaoController@excluirContribuicao');

Route::get('/isencao/contribuicao', 'Contribuicao\IsencaoController@index');

Route::get('/isencao/modalCadastro', 'Contribuicao\IsencaoController@modalCadastroIsencao');

Route::post('/isencao/saveIsencao', 'Contribuicao\IsencaoController@saveCadastroIsencao');

Route::get('/isencao/modalEditar/{co_seq_isencao_contribuicao}', 'Contribuicao\IsencaoController@modalEditarIsencao');

Route::post('/isencao/saveEditarIsencao', 'Contribuicao\IsencaoController@saveEditarIsencao');


Route::get('/excluirComprovante/{co_comprovante}', 'Contribuicao\ComprovanteController@excluirComprovante');

Route::post('/editarComprovante/', 'Contribuicao\ComprovanteController@editarComprovante');

Route::get('/desativarComprovante/{co_comprovante}', 'Contribuicao\ComprovanteController@desativarComprovante');

Route::post('/cadastroMensalidadePorPeriodo', 'Contribuicao\PagamentoController@pagamentoPeriodo');

Route::post('/cadastroMensalidadePorMes', 'Contribuicao\PagamentoController@pagamentoMes');

Route::post('/editarMensalidade', 'Contribuicao\PagamentoController@editarMensalidade');

Route::get('/comprovantes/{co_seq_comprovante}', 'Comprovante\DownloadController@comprovantes');


//perfil dados Pessoais

Route::get('/getCidade/{co_uf}', 'Perfil\CidadeController@getCidadeWithUf');

Route::get('/perfil/{id?}', 'Perfil\MembroController@index');

Route::post('/savePhoto', 'Perfil\FotosController@savePhoto');

Route::get('/changePhoto/{co_seq_foto}/{usuario}', 'Perfil\FotosController@changePhoto');

Route::post('/editarPessoal', 'Perfil\PessoalController@editarPessoal');

Route::get('/deletePhoto/{co_seq_foto}', 'Perfil\FotosController@deletePhoto');

Route::get('/formDesableHabilidade/{co_seq_usuario_profissao}', 'Perfil\TrabalhoController@formDesableHabilidade');

Route::post('/desableHabilidade', 'Perfil\TrabalhoController@desableHabilidade');

Route::post('/cadastrarTrabalho', 'Perfil\TrabalhoController@cadastrarTrabalho');

Route::post('/cadastrarTelefone', 'Perfil\TelefoneController@cadastrarTelefone');

Route::get('/formDesableTelefone/{co_seq_telefone}', 'Perfil\TelefoneController@formDesableTelefone');

Route::post('/desableTelefone', 'Perfil\TelefoneController@desableTelefone');

Route::post('/editarPerfil', 'Perfil\PerfilController@editarPerfil');


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

//rotas do grupo de alterar conteúdo do usuario

Route::get('/selecionarUsuario', 'Administrador\DadosPessoaisController@selecionarUsuario');
Route::get('/getDadosUsuarios/{cpf}', 'Administrador\DadosPessoaisController@getDadosUsuarios');

//rotas do grupo de tesouraria

Route::get('/controle/contribuicao', 'Tesouraria\IndexController@index');

Route::get('/getContribuicoes/{classificacaoPagamento}/{periodeDe}/{periodeAte}/{membro}', 'Tesouraria\IndexController@getContribuicoes');

Route::get('/tesouraria/comprovante/{co_seq_controle_contribuicao}', 'Tesouraria\IndexController@formComprovante');

Route::get('/tesouraria/formObservacao/{co_seq_controle_contribuicao}', 'Tesouraria\IndexController@formObservacao');

Route::post('/tesouraria/saveObservacao', 'Tesouraria\IndexController@saveObservacao');

Route::get('/tesouraria/formConfirmaContribuicao/{co_seq_controle_contribuicao}', 'Tesouraria\IndexController@formConfirmaContribuicao');

Route::get('/tesouraria/saveConfirmacaoContribuicao/{co_seq_grupo_permissoes}', 'Tesouraria\IndexController@saveConfirmacaoContribuicao');

Route::get('/tesouraria/formReprovaContribuicao/{co_seq_controle_contribuicao}', 'Tesouraria\IndexController@formReprovaContribuicao');

Route::get('/tesouraria/saveReprovaContribuicao/{co_seq_grupo_permissoes}', 'Tesouraria\IndexController@saveReprovaContribuicao');

Route::post('/tesouraria/saveAprovarSelecionados', 'Tesouraria\IndexController@saveAprovarSelecionados');

Route::post('/tesouraria/saveReprovacaoSelecionados', 'Tesouraria\IndexController@saveReprovacaoSelecionados');


//rotas do ajuste de contribuições

Route::get('/ajuste/contribuicao', 'Contribuicao\AjusteContribuicaoController@index');

//rotas do tipo de contribuicao

Route::get('/tipo/contribuicao/deposito', 'TipoContribuicao\ContribuicaoController@deposito');

Route::get('/tipo/contribuicao/gaveta', 'TipoContribuicao\ContribuicaoController@gaveta');

Route::get('/getTipoContribuicaoDeposito/{periodeDe}/{periodeAte}/{membro}', 'TipoContribuicao\ContribuicaoController@getdeposito');

Route::get('/getTipoContribuicaoGaveta/{periodeDe}/{periodeAte}/{membro}', 'TipoContribuicao\ContribuicaoController@getgaveta');

//totas Pendente de Contribuicao
Route::get('/pedente/contribuicao', 'Contribuicao\PedenteController@index');


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