<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'MainController@index');

Route::get('/{cat}', 'MainController@cat');

Route::get('article/{dataid}', 'MainController@inner');

Route::get('update', 'UpdateController@index');

Route::group(['middleware' => ['web']], function () {
    //
});
