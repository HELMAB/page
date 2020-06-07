<?php

Route::group(['prefix' => 'page'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('store', 'PageController@store');
        Route::post('show', 'PageController@show');
        Route::post('delete', 'PageController@delete');
        Route::post('datatable', 'PageController@datatable');
        Route::post('toggle', 'PageController@toggle');
    });
});

