<?php
#### image control
Route::get('image' , 'ImageController@index');
Route::get('image/item/{id?}' , 'ImageController@show');
Route::post('image/item' , 'ImageController@store');
Route::post('image/item/{id}' , 'ImageController@update');
Route::get('image/{id}/delete' , 'ImageController@destroy');
Route::get('image/{id}/view' , 'ImageController@getById');

#### gallery control
Route::get('gallery' , 'GalleryController@index');
Route::get('gallery/item/{id?}' , 'GalleryController@show');
Route::post('gallery/item' , 'GalleryController@store');
Route::post('gallery/item/{id}' , 'GalleryController@update');
Route::get('gallery/{id}/delete' , 'GalleryController@destroy');
Route::get('gallery/{id}/view' , 'GalleryController@getById');

#### slider control
Route::get('slider' , 'SliderController@index');
Route::get('slider/item/{id?}' , 'SliderController@show');
Route::post('slider/item' , 'SliderController@store');
Route::post('slider/item/{id}' , 'SliderController@update');
Route::get('slider/{id}/delete' , 'SliderController@destroy');
Route::get('slider/{id}/view' , 'SliderController@getById');

#### team control
//Route::get('team' , 'TeamController@index');
Route::get('team/item/{id?}' , 'TeamController@show');
Route::post('team/item' , 'TeamController@store');
Route::post('team/item/{id}' , 'TeamController@update');
Route::get('team/{id}/delete' , 'TeamController@destroy');
Route::get('team/{id}/view' , 'TeamController@getById');

#### workshop control
//Route::get('workshop' , 'WorkshopController@index');
Route::get('workshop/item/{id?}' , 'WorkshopController@show');
Route::post('workshop/item' , 'WorkshopController@store');
Route::post('workshop/item/{id}' , 'WorkshopController@update');
Route::get('workshop/{id}/delete' , 'WorkshopController@destroy');
//Route::get('workshop/{id}/view' , 'WorkshopController@getById');

#### administration control
Route::get('administration' , 'AdministrationController@index');
Route::get('administration/item/{id?}' , 'AdministrationController@show');
Route::post('administration/item' , 'AdministrationController@store');
Route::post('administration/item/{id}' , 'AdministrationController@update');
Route::get('administration/{id}/delete' , 'AdministrationController@destroy');
Route::get('administration/{id}/view' , 'AdministrationController@getById');

#### school control
Route::get('school' , 'SchoolController@index');
Route::get('school/item/{id?}' , 'SchoolController@show');
Route::post('school/item' , 'SchoolController@store');
Route::post('school/item/{id}' , 'SchoolController@update');
Route::get('school/{id}/delete' , 'SchoolController@destroy');
Route::get('school/{id}/view' , 'SchoolController@getById');