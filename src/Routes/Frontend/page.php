<?php

Route::group(['prefix' => 'page'], function () {
    Route::get('{type}', 'PageController@getPage');
});
