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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::resource('/painel/produtos', 'Painel\ProdutoController');

Route::group(['namespace' => 'Site'], function() {
    Route::get('/categoria/{id}', 'SiteController@categoria')->middleware('auth');
    Route::get('/categoria2/{id?}', 'SiteController@categoriaOp');
    Route::get('/contato', 'SiteController@contato');
    Route::get('/', 'SiteController@index');
});

//Route::get('/', '');

/*Route::group(['prefix' => 'painel', 'middleware' => 'auth'], function () {
    Route::get('/users', function () {
        return 'Controle de Users';
    });

    Route::get('/financeiro', function () {
        return 'Controle Financeiro';
    });

    Route::get('/', function () {
        return 'Dashboard';
    });
});*/

Route::get('/login', array('as'=>'login', function () {
    return '#form login';
}));

/*Route::get('/categoria2/{idCat?}', function ($idCat = 1) {
    return "Posts da categoria {$idCat}";
})->name('rota.nomeada');

Route::get('/categoria/{idCat}/nome-fixo/{prm2}', function ($idCat, $prm2) {
    return "Posts da categoria {$idCat} - {$prm2}";
});

Route::get('/nome/nome2/nome6', function () {
    return 'Rota grande';
})->name('rota.nomeada');

Route::any('/any', function () {
    return 'Route any';
});

Route::match(['get', 'post'], '/match', function () {
    return 'Route match';
});

Route::post('/post', function () {
    return 'Route Post';
});

Route::get('/contato', function () {
    return 'Contato';
});

Route::get('/empresa', function () {
    return view('empre
sa');
});
Route::get('/', function () {
    return redirect()->route('rota.nomeada');
}); */


