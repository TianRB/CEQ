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

// Rutas de Sesión
Auth::routes();

// Rutas para Admin
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('articles', 'ArticleController');
Route::resource('categories', 'CategoryController');
Route::resource('subcategories', 'SubcategoryController');
Route::resource('sliders', 'SliderController');
Route::resource('cards', 'CardController');
Route::post('articles/search',['uses' => 'ArticleController@searchResults', 'as' => 'articles.search']);





// Rutas para Front
Route::get('/', 'FrontController@index');
Route::get('/gastroenterologia/{slug}', 'FrontController@gastro');
Route::get('/gastroenterologia', 'FrontController@gastro'); // Sin slug, toma la primera tarjeta

Route::get('/related/{category}', 'FrontController@showRelatedArticles');
Route::get('/product/{article}', 'FrontController@showArticle');
Route::get('/product/view/{slug}', 'FrontController@articleBySlug');
Route::get('/category/{category}', 'FrontController@category');
Route::get('/sendmessage', 'FrontController@messagesend')->name('send.message');

// Rutas auxiliares
Route::get('/addSlugs', 'ArticleController@addSlugToAll');
