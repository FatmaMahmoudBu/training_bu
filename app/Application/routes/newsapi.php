<?php
            #News
            Route::get('news/getById/{id}/{lang?}', 'NewsApi@getById');
            Route::get('news/delete/{id}', 'NewsApi@delete');
            Route::post('news/add', 'NewsApi@add');
            Route::post('news/update/{id}', 'NewsApi@update');
            Route::get('news/{limit?}/{offset?}/{lang?}', 'NewsApi@index');