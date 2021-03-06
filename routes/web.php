<?php

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/reportar', 'HomeController@getReport');

Route::post('/reportar', 'HomeController@postReport');

Route::Get('productByCategory/{id}', 'DenunciaController@byCategory');
//como pasamos la variable correspondiente al id de la categoría como parámetro en la url en la ruta lo recibimos como parámetro


Route::group(['middleware'=>'admin', 'namespace'=>'Admin'], function (){


    // Denuncias
    Route::get('/denuncias', 'DenunciaController@index')->name('denuncias');
    Route::post('/denuncias', 'DenunciaController@store');

    Route::get('/denuncia/{id}', 'DenunciaController@edit')->name('edit');
    Route::post('/denuncia/{id}', 'DenunciaController@update');

    Route::get('/denuncia/{id}/eliminar', 'DenunciaController@delete')->name('delete');

    Route::get('/visualizar', 'DenunciaController@visualizar')->name('visualizar');

    Route::get('/home', 'DenunciaController@home')->name('home');


   Route::resource('/denuncia', 'DenunciaController');

//select anidado

Route::get('productByCategory/{id}', 'DenunciaController@byCategory')->name('productByCategory');
  //como pasamos la variable correspondiente al id de la categoría como parámetro en la url en la ruta lo recibimos como parámetro

Route::get('productBySecretaria/{id}', 'DenunciaController@bySecretaria')->name('productBySecretaria');
  //como pasamos la variable correspondiente al id de la categoría como parámetro en la url en la ruta lo recibimos como parámetro

  //PDF
  Route::get('/imprimir/{id}', 'DenunciaController@imprimir')->name('print');

  //Vista del Reporte de Denuncia
  Route::get('/reporte_denuncia/{id}', 'DenunciaController@reporteDenuncia')->name('reporte_denuncia');

  //Numero de Preventivo
  Route::get('/asignar_nro_preventivo/{id}', 'DenunciaController@editNroPreventivo')->name('editNroPreventivo');
  Route::post('/asignar_nro_preventivo/{id}', 'DenunciaController@updateNroPreventivo');

    // // Users
    // Route::get('/usuarios', 'UserController@index');
    // Route::post('/usuarios', 'UserController@store');
    //
    // Route::get('/usuario/{id}', 'UserController@edit');
    // Route::post('/usuario/{id}', 'UserController@update');
    //
    // Route::get('/usuario/{id}/eliminar', 'UserController@delete');

    // // Projects
    // Route::get('/proyectos', 'ProjectController@index');
    // Route::post('/proyectos', 'ProjectController@store');
    //
    // Route::get('/proyecto/{id}', 'ProjectController@edit');
    // Route::post('/proyecto/{id}', 'ProjectController@update');
    //
    // Route::get('/proyecto/{id}/eliminar', 'ProjectController@delete');
    //
    // Route::get('/proyecto/{id}/restaurar', 'ProjectController@restore');
    //
    // //Category
    // Route::post('/categorias', 'CategoryController@store');
    // Route::post('/categoria/editar', 'CategoryController@update');
    // Route::get('/categoria/{id}/eliminar', 'CategoryController@delete');
    //
    // //Level
    // Route::post('/niveles', 'LevelController@store');
    // Route::post('/nivel/editar', 'LevelController@update');
    // Route::get('/nivel/{id}/eliminar', 'LevelController@delete');
    //
    //
    // Route::get('/config', 'ConfigController@index');
});
