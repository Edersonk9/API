<?php

use Illuminate\Http\Request;

Route::get('help', 'ApiAuthC@help');

Route::post('login', 'ApiAuthC@login');
Route::post('logout', 'ApiAuthC@logout');

Route::prefix('mensagem')->group(function () {
  Route::post('list', 'ApiMensagemC@list');
  Route::post('all', 'ApiMensagemC@all');
  Route::post('show', 'ApiMensagemC@show');
  Route::post('store', 'ApiMensagemC@store');
  Route::post('update', 'ApiMensagemC@update');

});
Route::prefix('cliente')->group(function () {
  Route::post('list', 'ApiClienteC@list');
  Route::post('all', 'ApiClienteC@all');
  Route::post('show', 'ApiClienteC@show');
  Route::post('store', 'ApiClienteC@store');
  Route::post('update', 'ApiClienteC@update');

});
Route::prefix('vendedor')->group(function () {
  Route::post('list', 'ApiVendedorC@list');
  Route::post('all', 'ApiVendedorC@all');
  Route::post('show', 'ApiVendedorC@show');
  Route::post('store', 'ApiVendedorC@store');
  Route::post('update', 'ApiVendedorC@update');

});
