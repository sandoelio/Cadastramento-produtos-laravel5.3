<?php
/*Route::group(['prefix'=> 'painel','middleware'=>'auth'],function(){
	Route::get('/user',function(){
		return 'Controle Usuario';
	});
	Route::get('/financeiro',function(){
		return 'Controle financeiro';
	});
	Route::get('/',function(){
		return 'Principal';
	});
});

Route::get('/categoria2/{id?}',function($id = ""){
	return "categoria ".$id;
});

Route::get('/categoria/{id}/{param}',function($id,$param){
	return "categoria {$id} - {$param}";
});*/
Route::get('/login',function(){
	return '<h1>LOGIN</h1>';
})->name('login');

Route:: get('/painel/produtos/tests','Painel\ProdutoController@tests');
Route::resource('/painel/produtos','Painel\ProdutoController'); 

Route::group(['namespace'=>'Site'],function(){
	Route::get('/','SiteController@index');
	Route::get('/categoria/{id}','SiteController@categoria');
	Route::get('/categoria2/{id?}','SiteController@categoriaOp');
	Route::get('/contato','SiteController@contato');
});
