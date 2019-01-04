<?php

Route::group(['middleware' => 'web', 'prefix' => 'gestaotrocasunidades', 'namespace' => '\GestaoTrocasUnidades\Http\Controllers'], function()
{
    Route::get('/', 'GestaoTrocasUnidadesController@index');
});
