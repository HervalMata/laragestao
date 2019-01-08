<?php

Route::group(
    ['middleware' => ['auth', config('gestaotrocasuser.middleware.isVerified')],
    'as' => 'gestaotrocasuser.'], function () {
    Route::group(['prefix' => 'admin', 'middleware' => 'auth.resource'], function () {
        Route::resource('users', 'UsersController');
        Route::resource('roles', 'RoleController');
        Route::get('roles/{role}/permissions', 'RoleController@editPermission')->name('roles.permissions.edit');
        Route::get('roles/{role}/permissions', 'RoleController@updatePermission')->name('roles.permissions.update');
    });

    Route::get('users/settings', 'UserSettingsController@edit')->name('user_settings.edit');
    Route::put('users/settings', 'UserSettingsController@update')->name('user_settings.update');

    Route::get('email-verification/error', 'UserConfirmationController@getVerificationError')->name('email-verification.error');
    Route::get('email-verification/check/{token}', 'UserConfirmationController@getVerification')->name('email-verification.check');
});




