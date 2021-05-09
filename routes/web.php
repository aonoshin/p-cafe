<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');

Route::get('/top', 'TopController@top')->name('top');

// 管理画面
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function(){
    Route::get('/', 'AdminController@top')->name('top')->middleware('can:admin');
    Route::get('/users', 'AdminController@users')->name('users')->middleware('can:admin');
    Route::get('/shops', 'AdminController@shopIndex')->name('shops.index')->middleware('can:admin');
    Route::get('/shops/{shop}', 'AdminController@shopShow')->name('shops.show')->middleware('can:admin')->where('shop', '[0-9]+');
    Route::get('/shops/create', 'AdminController@shopCreate')->name('shops.create')->middleware('can:admin');
    Route::post('/shops/store', 'AdminController@shopStore')->name('shops.store')->middleware('can:admin');
    Route::get('/shops/{shop}/edit', 'AdminController@shopEdit')->name('shops.edit')->middleware('can:admin')->where('shop', '[0-9]+');
    Route::put('/shops/{shop}', 'AdminController@shopUpdate')->name('shops.update')->middleware('can:admin')->where('shop', '[0-9]+');
    Route::post('/shops/delete/{id}', 'AdminController@shopDelete')->name('shops.delete')->middleware('can:admin')->where('id', '[0-9]+');
    Route::get('/areas', 'AdminController@areaIndex')->name('areas.index')->middleware('can:admin');
    Route::get('/areas/create', 'AdminController@areaCreate')->name('areas.create')->middleware('can:admin');
    Route::post('/areas/store', 'AdminController@areaStore')->name('areas.store')->middleware('can:admin');
    Route::get('/areas/{area}/edit', 'AdminController@areaEdit')->name('areas.edit')->middleware('can:admin')->where('area', '[0-9]+');
    Route::put('/areas/{area}', 'AdminController@areaUpdate')->name('areas.update')->middleware('can:admin')->where('area', '[0-9]+');
    Route::post('/areas/delete/{id}', 'AdminController@areaDelete')->name('areas.delete')->middleware('can:admin')->where('id', '[0-9]+');
    Route::get('/temas', 'AdminController@temaIndex')->name('temas.index')->middleware('can:admin');
    Route::get('/temas/create', 'AdminController@temaCreate')->name('temas.create')->middleware('can:admin');
    Route::post('/temas/store', 'AdminController@temaStore')->name('temas.store')->middleware('can:admin');
    Route::get('/temas/{tema}/edit', 'AdminController@temaEdit')->name('temas.edit')->middleware('can:admin')->where('tema', '[0-9]+');
    Route::put('/temas/{tema}', 'AdminController@temaUpdate')->name('temas.update')->middleware('can:admin')->where('tema', '[0-9]+');
    Route::post('/temas/delete/{id}', 'AdminController@temaDelete')->name('temas.delete')->middleware('can:admin')->where('id', '[0-9]+');
    Route::get('/comments', 'AdminController@commentIndex')->name('comments.index')->middleware('can:admin');
});

// ユーザー
Route::group(['prefix' => 'users', 'as' => 'users.', 'middleware' => 'auth'], function(){
    Route::get('/', 'UserController@index')->name('index');
    Route::get('/{user}', 'UserController@show')->name('show')->where('user', '[0-9]+');
    Route::get('/{user}/edit', 'UserController@edit')->name('edit')->where('user', '[0-9]+');
    Route::put('/{user}', 'UserController@update')->name('update')->where('user', '[0-9]+');
    Route::post('/delete/{id}', 'UserController@delete')->name('delete')->where('id', '[0-9]+');
    Route::get('/{user}/edit/icon', 'UserController@icon')->name('icon')->where('id', '[0-9]+');
    Route::put('/{user}/icon', 'UserController@iconupdate')->name('icon-update')->where('id', '[0-9]+');
    Route::get('/{user}/comments', 'UserController@comment')->name('comments')->where('user', '[0-9]+');
});

// カフェ
Route::group(['prefix' => 'shops', 'as' => 'shops.'], function(){
    Route::get('/', 'ShopController@index')->name('index');
    Route::get('/created', 'ShopController@shopCreatedIndex')->name('created.index');
    Route::get('/updated', 'ShopController@shopUpdatedIndex')->name('updated.index');
    Route::get('/{shop}', 'ShopController@show')->name('show')->where('shop', '[0-9]+');
    Route::get('/like/{id}', 'ShopController@like')->name('like')->where('id', '[0-9]+')->middleware('auth');
    Route::get('/unlike/{id}', 'ShopController@unlike')->name('unlike')->where('id', '[0-9]+')->middleware('auth');
    Route::get('/favorite', 'ShopController@shopFavoriteIndex')->name('favorite.index');
    Route::get('/rank', 'ShopController@shopRankIndex')->name('rank.index');
    Route::get('/{area}', 'ShopController@shopAreaIndex')->name('area.index');
});

// お問い合わせ
Route::group(['prefix' => 'contacts', 'as' => 'contacts.'], function(){
    Route::get('/', 'ContactController@create')->name('create');
    Route::post('/confirm', 'ContactController@confirm')->name('confirm');
    Route::post('/store', 'ContactController@store')->name('store');
    Route::get('/complete', 'ContactController@complete')->name('complete');
});

// 口コミ
Route::group(['prefix' => 'shops', 'as' => 'comments.', 'middleware' => 'auth'], function(){
    Route::get('/{shop}/comments/create', 'CommentController@create')->name('create')->where('shop', '[0-9]+');
    Route::post('/{shop}/comments/store', 'CommentController@store')->name('store')->where('shop', '[0-9]+');
    Route::get('/{shop}/comments/{comment}/edit', 'CommentController@edit')->name('edit')->where('shop|comment', '[0-9]+');
    Route::put('/{shop}/comments/{comment}', 'CommentController@update')->name('update')->where('shop|comment', '[0-9]+')->middleware('can:view,comment');
});
// Route::post('/users/{user}/comments/{id}', 'CommentController@delete')->name('comments.delete')->where('id', '[0-9]+');
Route::post('/comments/{id}', 'CommentController@delete')->name('comments.delete')->where('id', '[0-9]+');

Auth::routes();