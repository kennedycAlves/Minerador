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

use App\Http\Controllers\Auth\AdminLoginController;

Route::get('/', function () {
    return view('index');
});


Route::get('/clientes', 'ControladorClientes@index')
    ->middleware('auth:admin')
    ->name('inicioAdmin');

Route::get('/cadastrarclientes','ControladorClientes@create')
    ->middleware('auth:admin');

Route::post('/clientes/cadastrar', 'ControladorClientes@store')
    ->middleware('auth:admin');

Route::get('/clientes/apagar/{id}', 'ControladorClientes@destroy')
    ->middleware('auth:admin');
    
Route::get('/clientes/editar/{id}', 'ControladorClientes@edit')
    ->middleware('auth:admin');

Route::post('/clientes/{id}', 'ControladorClientes@update')
    ->middleware('auth:admin');;

Route::get('/clientes/inserir/interesse/{id}', 'ControladorClientes@adicionaNovaArea')
    ->middleware('auth:admin');

Route::post('/cliente/novoInterese/{id}', 'ControladorClientes@storeNovaArea')
    ->middleware('auth:admin');

Route::get('/admin/login/', 'Auth\AdminLoginController@indexlogin')->name('admin.login');

Route::post('/admin/login/', 'Auth\AdminLoginController@login')->name('admin.login.submit');

Route::get('/admin/dash/', 'Auth\AdminLoginController@index')
    ->middleware('auth:admin');

Route::get('/clientes/sair', 'Auth\AdminLoginController@sair')
    ->middleware('auth:admin');   



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/homeuser/{id}', 'ControladorClientes@showUser')
    ->middleware('auth')
    ->name('homeuser');



Route::post('/autoedit/save/{id}/{idArea}', 'ControladorClientes@updateAutoEdit')
    ->middleware('auth');

Route::get('/licitacoes/{id}', 'ControladorClientes@showLicitacoes')
    ->middleware('auth')
    ->name('showLicitacoes');

    
   






