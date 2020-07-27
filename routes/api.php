<?php


Route::namespace('Auth')->group(function () {

    Route::post('register', 'RegisterController');
    Route::post('login', 'LoginController');
    Route::post('logout', 'LogoutController');

});

Route::namespace('Article')->middleware('auth:api')->group(function () {

    Route::post('create-new-article', 'ArticleController@store');
    Route::patch('update-this-article/{article}', 'ArticleController@update');
    Route::delete('delete-this-article/{article}', 'ArticleController@destroy');

});

Route::get('articles/{article}', "Article\ArticleController@show");
Route::get('articles', "Article\ArticleController@index");

Route::get('user', 'UserController');