<?php
                #### News control
                Route::get('news', 'NewsController@index');
                Route::get('news/item/{id?}', 'NewsController@show');
                Route::post('news/item', 'NewsController@store');
                Route::post('news/item/{id}', 'NewsController@update');
                Route::get('news/{id}/delete', 'NewsController@destroy');
                Route::get('news/{id}/view', 'NewsController@getById');