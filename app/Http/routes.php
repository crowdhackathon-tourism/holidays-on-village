<?php


Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('/social/redirect/{provider}',  ['as' => 'social.redirect',   'uses' => 'Auth\AuthController@getSocialRedirect']);
Route::get('/social/handle/{provider}', ['as' => 'social.handle',     'uses' => 'Auth\AuthController@getSocialHandle']);

Route::get('/', ['as' => 'home', function () {
    return view('home');
}]);

Route::get('/home', ['as' => 'explore', function () {
    return view('explore');
}]);

Route::get('/search', 'SearchController@index');

Route::get('/account/profile', ['as' => 'explore', function () {
    return view('profile');
}]);

Route::resource('region', 'RegionController');
Route::get('county/geo/{id}', 'CountyController@geo');
Route::resource('county', 'CountyController');
Route::resource('municipality', 'MunicipalityController');
Route::resource('village', 'VillageController');