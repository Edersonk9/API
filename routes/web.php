<?php
Route::get('mail', 'MailC@SendEmail')->name('mail');
Route::post('consulta_cep', 'EmpresaC@consulta_cep')->name('consulta_cep');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/web', function () {
  return response()->json(['status'=>true,'Great thenks'],200);
});

Route::get('/', function () {
  return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function(){ // USER USER USER USER USER USER USER
  // ALERTA
  Route::resource('alerta', 'AlertaC');
  // PERFIL
  Route::resource('perfil', 'PerfilC');
  // SENDMAIL
  Route::get('mailsend/cadastrado/{email}/{senha}/{empresa}','MailC@SendEmailCad')->name('user_cadastrado');
  // CLIENTE
  Route::resource('cliente', 'ClienteC');
  // MENSAGEM
  Route::resource('mensagem', 'MensagemC');

  Route::group(['middleware' => ['authAdm']], function(){ // ADM ADM ADM ADM ADM ADM ADM ADM
    // HOME
    Route::get('/adm/home', 'HomeController@index')->name('homeAdm');
    // GRUPO
    Route::resource('grupo', 'GrupoC');
    // USUÁRIO
    Route::resource('usuario', 'UsuarioC');
    // VENDEDOR
    Route::resource('vendedor', 'VendedorC');

    Route::group(['middleware' => ['authRoot']], function(){ // ROOT ROOT ROOT ROOT ROOT ROOT
      // EMPRESA
      Route::resource('empresa', 'EmpresaC');
      Route::post('consulta_cep', 'EmpresaC@consulta_cep')->name('consulta_cep');
    });
  });
});

/* RESOURCE
GET	    /photos	                 index	  name.index
GET	    /photos/create	         create	  name.create
POST	  /photos	                 store	  name.store
GET	    /photos/{name}	         show	    name.show
GET	    /photos/{name}/edit	     edit	    name.edit
PUT     /PATCH	/name/{name}	   update	  name.update
DELETE	/photos/{name}	         destroy	name.destroy
*/
