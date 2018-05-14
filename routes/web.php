<?php
/*
 * Calculator pages
 */

Route::get('/', 'UserInfoController@tourism');

Route::post('/', 'UserInfoController@store');

Route::get('/userList', 'UserInfoController@userList');

Route::get('/{id}/userEdit', 'UserInfoController@userEdit');

Route::put('/{id}','UserInfoController@update');

Route::delete('/{id}','UserInfoController@destroy');

