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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/testefoto', function () {
    return Layout::foto();
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/perfil', 'Perfil\MembroController@index');

Route::post('/savePhoto', 'Perfil\FotosController@savePhoto');

Route::get('/index', 'Layout\LayoutController@index');


Route::get('/cadastro-parlamentar', function () {
    return view('example-view.cadastro-parlamentar');
});

Route::get('/cadastro-partido', function () {
    return view('example-view.cadastro-partido');
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