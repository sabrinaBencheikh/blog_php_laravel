<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::resource('admin/articles', 'ArticlesController')->except(['index', 'show']);

Route::get('/', 'HomeController@index');

Route::get('/Articles', 'ArticlesController@index')->name('articles.index');
Route::get('/Articles/{post_name}', 'ArticlesController@show')->name('article.show');

Route::get('/Contacts', 'ContactsController@create');
Route::post('/Contacts', 'ContactsController@store');

Route::resource('admin/comments', 'CommentController')->except('show');
Route::get('/Articles/{post_name}/Comments', 'CommentController@show')->name('comment.show');;
Route::post('/Comments/{post}', 'CommentController@store')->name('comments.store');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

