<?php


Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

//Route::post('pegawai/login', 'API\LoginController@login');

Route::get('pegawai/login', 'Admin\PegawaiController@showLogin');

Route::post('pegawai/login', 'LoginController@login');

Route::get('/pegawai/logout', 'LoginController@logout');

/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'api', 'middleware' => 'auth:api', 'namespace' => 'API'], function () {
    

    Route::post('tes', function(){
    	Auth::guard('api')->pegawai();
    });
});

Route::group(['middleware'=> ['admins']], function (){
	

Route::get('admin/pegawais', ['as'=> 'admin.pegawais.index', 'uses' => 'Admin\PegawaiController@index']);
Route::post('admin/pegawais', ['as'=> 'admin.pegawais.store', 'uses' => 'Admin\PegawaiController@store']);
Route::get('admin/pegawais/create', ['as'=> 'admin.pegawais.create', 'uses' => 'Admin\PegawaiController@create']);
Route::put('admin/pegawais/{pegawais}', ['as'=> 'admin.pegawais.update', 'uses' => 'Admin\PegawaiController@update']);
Route::patch('admin/pegawais/{pegawais}', ['as'=> 'admin.pegawais.update', 'uses' => 'Admin\PegawaiController@update']);
Route::delete('admin/pegawais/{pegawais}', ['as'=> 'admin.pegawais.destroy', 'uses' => 'Admin\PegawaiController@destroy']);
Route::get('admin/pegawais/{pegawais}', ['as'=> 'admin.pegawais.show', 'uses' => 'Admin\PegawaiController@show']);
Route::get('admin/pegawais/{pegawais}/edit', ['as'=> 'admin.pegawais.edit', 'uses' => 'Admin\PegawaiController@edit']);

});

Route::group(['middleware' => ['pegawais']], function(){
		/**
	 * Klasifikasi Route Collection
	 */
	Route::get('admin/klasifikasis', ['as'=> 'admin.klasifikasis.index', 'uses' => 'Admin\KlasifikasiController@index']);
	Route::post('admin/klasifikasis', ['as'=> 'admin.klasifikasis.store', 'uses' => 'Admin\KlasifikasiController@store']);
	Route::get('admin/klasifikasis/create', ['as'=> 'admin.klasifikasis.create', 'uses' => 'Admin\KlasifikasiController@create']);
	Route::put('admin/klasifikasis/{klasifikasis}', ['as'=> 'admin.klasifikasis.update', 'uses' => 'Admin\KlasifikasiController@update']);
	Route::patch('admin/klasifikasis/{klasifikasis}', ['as'=> 'admin.klasifikasis.update', 'uses' => 'Admin\KlasifikasiController@update']);
	Route::delete('admin/klasifikasis/{klasifikasis}', ['as'=> 'admin.klasifikasis.destroy', 'uses' => 'Admin\KlasifikasiController@destroy']);
	Route::get('admin/klasifikasis/{klasifikasis}', ['as'=> 'admin.klasifikasis.show', 'uses' => 'Admin\KlasifikasiController@show']);
	Route::get('admin/klasifikasis/{klasifikasis}/edit', ['as'=> 'admin.klasifikasis.edit', 'uses' => 'Admin\KlasifikasiController@edit']);

	/**
	 * Sifatsurat Route Collection
	 */
	Route::get('admin/sifatsurats', ['as'=> 'admin.sifatsurats.index', 'uses' => 'Admin\SifatsuratController@index']);
	Route::post('admin/sifatsurats', ['as'=> 'admin.sifatsurats.store', 'uses' => 'Admin\SifatsuratController@store']);
	Route::get('admin/sifatsurats/create', ['as'=> 'admin.sifatsurats.create', 'uses' => 'Admin\SifatsuratController@create']);
	Route::put('admin/sifatsurats/{sifatsurats}', ['as'=> 'admin.sifatsurats.update', 'uses' => 'Admin\SifatsuratController@update']);
	Route::patch('admin/sifatsurats/{sifatsurats}', ['as'=> 'admin.sifatsurats.update', 'uses' => 'Admin\SifatsuratController@update']);
	Route::delete('admin/sifatsurats/{sifatsurats}', ['as'=> 'admin.sifatsurats.destroy', 'uses' => 'Admin\SifatsuratController@destroy']);
	Route::get('admin/sifatsurats/{sifatsurats}', ['as'=> 'admin.sifatsurats.show', 'uses' => 'Admin\SifatsuratController@show']);
	Route::get('admin/sifatsurats/{sifatsurats}/edit', ['as'=> 'admin.sifatsurats.edit', 'uses' => 'Admin\SifatsuratController@edit']);

	Route::get('suratmasuks', ['as'=> 'admin.suratmasuks.index', 'uses' => 'Admin\SuratmasukController@index']);
	Route::post('suratmasuks', ['as'=> 'admin.suratmasuks.store', 'uses' => 'Admin\SuratmasukController@store']);
	Route::get('suratmasuks/create', ['as'=> 'admin.suratmasuks.create', 'uses' => 'Admin\SuratmasukController@create']);
	Route::put('suratmasuks/{suratmasuks}', ['as'=> 'admin.suratmasuks.update', 'uses' => 'Admin\SuratmasukController@update']);
	Route::patch('suratmasuks/{suratmasuks}', ['as'=> 'admin.suratmasuks.update', 'uses' => 'Admin\SuratmasukController@update']);
	Route::delete('suratmasuks/{suratmasuks}', ['as'=> 'admin.suratmasuks.destroy', 'uses' => 'Admin\SuratmasukController@destroy']);
	Route::get('suratmasuks/{suratmasuks}', ['as'=> 'admin.suratmasuks.show', 'uses' => 'Admin\SuratmasukController@show']);
	Route::get('suratmasuks/{suratmasuks}/edit', ['as'=> 'admin.suratmasuks.edit', 'uses' => 'Admin\SuratmasukController@edit']);



	/**
	* Lampiran
	**/
	Route::get('suratmasuks/{suratmasuks}/lampiran',[ 'as' => 'admin.suratmasuks.lampiran', 'uses' => 'Admin\LampiranController@index']);
	Route::get('suratmasuks/{suratmasuks}/lampiran/create',[ 'as' => 'admin.suratmasuks.lampiran.create', 'uses' => 'Admin\LampiranController@create']);
	Route::post('suratmasuks/{id}/lampiran/store',[ 'as' => 'admin.suratmasuks.lampiran.store', 'uses' => 'Admin\LampiranController@store']);
	Route::delete('suratmasuks/{suratmasuks}/lampiran/{lampiran}', ['as'=> 'admin.suratmasuks.lampiran.destroy', 'uses' => 'Admin\LampiranController@destroy']);
	Route::get('suratmasuks/{suratmasuks}/lampiran/{lampiran}', ['as'=> 'admin.suratmasuks.lampiran.show', 'uses' => 'Admin\LampiranController@show']);

	/**
	* Disposisi
	**/
	Route::get('suratmasuks/{suratmasuks}/disposisi',[ 'as' => 'admin.suratmasuks.disposisi', 'uses' => 'DisposisiController@index']);
	Route::get('suratmasuks/{suratmasuks}/disposisi/create',[ 'as' => 'admin.suratmasuks.disposisi.create', 'uses' => 'DisposisiController@create']);
	Route::post('suratmasuks/{id}/disposisi/store',[ 'as' => 'admin.suratmasuks.disposisi.store', 'uses' => 'DisposisiController@store']);
	Route::delete('suratmasuks/{suratmasuks}/disposisi/{disposisi}', ['as'=> 'admin.suratmasuks.disposisi.destroy', 'uses' => 'DisposisiController@destroy']);
	Route::get('suratmasuks/{suratmasuks}/disposisi/{disposisi}', ['as'=> 'admin.suratmasuks.disposisi.show', 'uses' => 'DisposisiController@show']);

	Route::get('suratmasuks/{suratmasuks}/disposisi/{disposisi}/edit', ['as'=> 'admin.suratmasuks.disposisi.edit', 'uses' => 'DisposisiController@edit']);

	Route::patch('suratmasuks/{suratmasuks}/disposisi/{disposisi}', ['as'=> 'admin.suratmasuks.disposisi.update', 'uses' => 'DisposisiController@update']);



	Route::get('admin/jenissurats', ['as'=> 'admin.jenissurats.index', 'uses' => 'Admin\JenissuratController@index']);
	Route::post('admin/jenissurats', ['as'=> 'admin.jenissurats.store', 'uses' => 'Admin\JenissuratController@store']);
	Route::get('admin/jenissurats/create', ['as'=> 'admin.jenissurats.create', 'uses' => 'Admin\JenissuratController@create']);
	Route::put('admin/jenissurats/{jenissurats}', ['as'=> 'admin.jenissurats.update', 'uses' => 'Admin\JenissuratController@update']);
	Route::patch('admin/jenissurats/{jenissurats}', ['as'=> 'admin.jenissurats.update', 'uses' => 'Admin\JenissuratController@update']);
	Route::delete('admin/jenissurats/{jenissurats}', ['as'=> 'admin.jenissurats.destroy', 'uses' => 'Admin\JenissuratController@destroy']);
	Route::get('admin/jenissurats/{jenissurats}', ['as'=> 'admin.jenissurats.show', 'uses' => 'Admin\JenissuratController@show']);
	Route::get('admin/jenissurats/{jenissurats}/edit', ['as'=> 'admin.jenissurats.edit', 'uses' => 'Admin\JenissuratController@edit']);


	Route::get('admin/jenissurats', ['as'=> 'admin.jenissurats.index', 'uses' => 'Admin\JenissuratController@index']);
	Route::post('admin/jenissurats', ['as'=> 'admin.jenissurats.store', 'uses' => 'Admin\JenissuratController@store']);
	Route::get('admin/jenissurats/create', ['as'=> 'admin.jenissurats.create', 'uses' => 'Admin\JenissuratController@create']);
	Route::put('admin/jenissurats/{jenissurats}', ['as'=> 'admin.jenissurats.update', 'uses' => 'Admin\JenissuratController@update']);
	Route::patch('admin/jenissurats/{jenissurats}', ['as'=> 'admin.jenissurats.update', 'uses' => 'Admin\JenissuratController@update']);
	Route::delete('admin/jenissurats/{jenissurats}', ['as'=> 'admin.jenissurats.destroy', 'uses' => 'Admin\JenissuratController@destroy']);
	Route::get('admin/jenissurats/{jenissurats}', ['as'=> 'admin.jenissurats.show', 'uses' => 'Admin\JenissuratController@show']);
	Route::get('admin/jenissurats/{jenissurats}/edit', ['as'=> 'admin.jenissurats.edit', 'uses' => 'Admin\JenissuratController@edit']);


	Route::get('admin/haraps', ['as'=> 'admin.haraps.index', 'uses' => 'Admin\HarapController@index']);
	Route::post('admin/haraps', ['as'=> 'admin.haraps.store', 'uses' => 'Admin\HarapController@store']);
	Route::get('admin/haraps/create', ['as'=> 'admin.haraps.create', 'uses' => 'Admin\HarapController@create']);
	Route::put('admin/haraps/{haraps}', ['as'=> 'admin.haraps.update', 'uses' => 'Admin\HarapController@update']);
	Route::patch('admin/haraps/{haraps}', ['as'=> 'admin.haraps.update', 'uses' => 'Admin\HarapController@update']);
	Route::delete('admin/haraps/{haraps}', ['as'=> 'admin.haraps.destroy', 'uses' => 'Admin\HarapController@destroy']);
	Route::get('admin/haraps/{haraps}', ['as'=> 'admin.haraps.show', 'uses' => 'Admin\HarapController@show']);
	Route::get('admin/haraps/{haraps}/edit', ['as'=> 'admin.haraps.edit', 'uses' => 'Admin\HarapController@edit']);


	Route::get('admin/agendasuratmasuks', ['as'=> 'admin.agendasuratmasuks.index', 'uses' => 'Admin\AgendasuratmasukController@index']);
	Route::post('admin/agendasuratmasuks', ['as'=> 'admin.agendasuratmasuks.store', 'uses' => 'Admin\AgendasuratmasukController@store']);
	Route::get('admin/agendasuratmasuks/create', ['as'=> 'admin.agendasuratmasuks.create', 'uses' => 'Admin\AgendasuratmasukController@create']);
	Route::put('admin/agendasuratmasuks/{agendasuratmasuks}', ['as'=> 'admin.agendasuratmasuks.update', 'uses' => 'Admin\AgendasuratmasukController@update']);
	Route::patch('admin/agendasuratmasuks/{agendasuratmasuks}', ['as'=> 'admin.agendasuratmasuks.update', 'uses' => 'Admin\AgendasuratmasukController@update']);
	Route::delete('admin/agendasuratmasuks/{agendasuratmasuks}', ['as'=> 'admin.agendasuratmasuks.destroy', 'uses' => 'Admin\AgendasuratmasukController@destroy']);
	Route::get('admin/agendasuratmasuks/{agendasuratmasuks}', ['as'=> 'admin.agendasuratmasuks.show', 'uses' => 'Admin\AgendasuratmasukController@show']);
	Route::get('admin/agendasuratmasuks/{agendasuratmasuks}/edit', ['as'=> 'admin.agendasuratmasuks.edit', 'uses' => 'Admin\AgendasuratmasukController@edit']);


});






// Route::group(['middleware'=> ['auth', 'pegawai']], function (){
	Route::resource('disposisis', 'DisposisiController');	
// });

