<?php
/*
 * Calculator pages
 */

Route::get('/', 'CalculatorController@calculate');

Route::post('/', 'CalculatorController@store');
