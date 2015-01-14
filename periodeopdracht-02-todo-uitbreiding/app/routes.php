<?php

Route::get('/', array('as' => 'Home', 'uses' => 'HomeController@getIndex'));


Route::get('/login', array('as' => 'login', 'uses' => 'AuthController@getLogin'))->before('guest');
Route::post('/login', array('uses' => 'AuthController@postLogin'));

Route::get('/register', array('as' => 'register', 'uses' => 'AuthController@getRegister'));
Route::post('/register', array('uses' => 'AuthController@postRegister'));

Route::get('/logout', array('as' => 'logout', 'uses' => 'AuthController@logout'));


Route::get('/todo', array('as' => 'todo', 'uses' => 'TodoController@getTodo'))->before('auth');

Route::get('/todo/add', array('as' => 'newTodo', 'uses' => 'TodoController@getNew'))->before('auth');
Route::post('/todo/add', array('uses' => 'TodoController@postNew'))->before('auth');

Route::get('/todo/activate/{id}', array('as' => 'activate', 'uses' => 'TodoController@activate'));
Route::get('/todo/delete/{id}', array('as' => 'delete', 'uses' => 'TodoController@delete'));

?>