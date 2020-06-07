<?php

Route::group(['prefix' => 'page'], function () {
    Route::post('{type}', 'PageController@getPage');
});
