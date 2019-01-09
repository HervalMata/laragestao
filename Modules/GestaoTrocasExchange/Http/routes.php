<?php

Route::group(['middleware' => 'web', 'prefix' => 'gestaotrocasexchange', 'namespace' => '\GestaoTrocasExchange\Http\Controllers'], function()
{
    Route::get('/', 'GestaoTrocasExchangeController@index');
});
