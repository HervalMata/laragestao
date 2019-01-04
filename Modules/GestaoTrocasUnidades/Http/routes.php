<?php

Route::group(['middleware' => 'auth'], function () {
    Route::resource('units', 'UnitsController');
    Route::group(['prefix' => 'trashed', 'as' => 'trashed.'], function () {
        Route::resource('units', 'UnitsTrashedController',
            ['except' => ['create', 'edit', 'store', 'destroy']]);
    });
});
