<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/proyecto/{id}/niveles', 'Admin\LevelController@byProject');

//Extraer los datos de la Base de Datos para armar el DataTable
Route::get('denuncias', function (){
  return datatables()
    ->eloquent(App\Denuncias::query())
    ->addColumn('btn', 'actions')
    ->rawColumns(['btn'])
    ->toJson();
});
