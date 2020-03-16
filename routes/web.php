<?php

Route::get('/', function () {
    return redirect('login');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

#teste
#Route::get('/teste', 'recepcao\atendimento\PacienteController@search')->name('teste');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});
//Route::get('atendimento', 'recepcao\atendimento\AtendimentoController@exibeHorariosAtendimento')->name('teste');
Route::group(['middleware' => 'auth', 'namespace' => 'recepcao\atendimento'], function () {
	Route::resource('atendimento', 'AtendimentoController');
	
	Route::resource('pacientes', 'PacienteController');
	Route::get('editarAtendimento', 'AtendimentoController@editar')->name('editarAtendimento');
});

Route::group(['middleware' => 'auth', 'namespace' => 'recepcao\configuracoes'], function(){
	Route::resource('escala', 'EscalaController');
});

// SCRIPTS POST
Route::group(['middleware' => 'auth', 'namespace' => 'recepcao\atendimento'], function () {
	Route::post('paciente', 'PacienteController@search')->name('listaPacientes');
	Route::post('horariosAtendimento', 'AtendimentoController@exibeHorariosAtendimento')->name('horariosAtendimento');
});


