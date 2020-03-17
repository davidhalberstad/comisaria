<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/reportar', 'HomeController@getReport');

Route::post('/reportar', 'HomeController@postReport');



Route::group(['middleware'=>'admin', 'namespace'=>'Admin'], function (){


    // Denuncias
    Route::get('/denuncias', 'DenunciaController@index');
    Route::post('/denuncias', 'DenunciaController@store');

    Route::get('/denuncia/{id}', 'DenunciaController@edit');
    Route::post('/denuncia/{id}', 'DenunciaController@update');

    Route::get('/denuncia/{id}/eliminar', 'DenunciaController@delete');

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
