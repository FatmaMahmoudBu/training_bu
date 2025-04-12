<?php

Route::get('/', 'HomeController@welcome');

Route::get('contact' , 'ContactController@index');

Route::get('login', [
  'as' => 'login',
  'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::post('login', [
  'as' => '',
  'uses' => 'Auth\LoginController@login'
]);
Route::post('logout', [
  'as' => 'logout',
  'uses' => 'Auth\LoginController@logout'
]);


Route::get('/register', function(){
  return redirect( url('/login'));
});

Route::get('page' , 'PageController@index');
Route::get('page/{slug}' , 'PageController@getById');


Route::get('news' , 'NewsController@index');
Route::get('news/show_news' , 'NewsController@show_news');
Route::get('news/{id}', 'NewsController@getById');

Route::get('team' , 'TeamController@index');

#### workshop control
Route::get('workshop' , 'WorkshopController@index');
Route::get('workshop/{id}/view' , 'WorkshopController@getById');
