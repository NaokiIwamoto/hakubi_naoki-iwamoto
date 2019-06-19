<?php
use Symfony\Component\HttpKernel\Fragment\RoutableFragmentRenderer;
use Nexmo\User\User;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/add_admin_user', 'UserController@open_add_admin_page')->name('admin_add');
Route::post('/admin/add_admin_user/register', 'UserController@admin_register')->name('admin_register');
Route::get('/admin/category', 'CategoryController@open_category_admin')->name('open_category_admin');
Route::get('/admin/category/add_category', 'CategoryController@add_category_admin')->name('add_category_admin');
Route::post('/admin/category/add_category/store', 'CategoryController@store_category_admin')->name('store_category_admin');
Route::get('/admin/category/{id}/edit', 'CategoryController@edit_category_admin')->name('edit_category_admin');
Route::post('/admin/category/{id}/update', 'CategoryController@update_category_admin')->name('update_category_admin');
Route::get('/admin/category/{id}/delete', 'CategoryController@delete_category_admin')->name('delete_category_admin');

Route::get('/admin/category/{id}/words', 'WordController@words_admin')->name('words_admin');
Route::get('/admin/category/{id}/words/add', 'WordController@add_word_admin')->name('add_word_admin');
Route::post('/admin/category/{id}/words/add/store', 'WordController@store_word_admin')->name('store_word_admin');
Route::get('/admin/category/words/{word_id}/edit', 'WordController@edit_word_admin')->name('edit_word_admin');
Route::post('/admin/category/words/{word_id}/edit/update', 'WordController@update_word_admin')->name('update_word_admin');
Route::get('/admin/category/words/{word_id}/delete', 'WordController@delete_word_admin')->name('delete_word_admin');
<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes

Route::get('/admin/category/{word_id}/option/add', 'WordController@add_option_admin')->name('add_option_admin');
Route::post('/admin/category/{word_id}/option/add/store', 'WordController@store_option_admin')->name('store_option_admin');
Route::get('/admin/category/{word_id}/optioin/edit', 'WordController@edit_option_admin')->name('edit_option_admin');
Route::post('/admin/category/{word_id}/option/edit/update', 'WordController@update_option_admin')->name('update_option_admin');
<<<<<<< Updated upstream


Route::get('/user/edit', 'UserController@edit_profile')->name('edit_profile');
Route::post('/user/update', 'UserController@update_profile')->name('update_profile');
=======

Route::get('/user/edit', 'UserController@edit_profile')->name('edit_profile');
Route::post('/user/update', 'UserController@update_profile')->name('update_profile');

Route::get('/user/icon', 'UserController@edit_icon')->name('edit_icon');
Route::post('/user/icon/update', 'UserController@update_icon')->name('update_icon');

Route::get('/users', 'UserController@users_list')->name('users_list');

Route::get('/user/{id}/follow', 'UserController@follow')->name('follow');
Route::get('/user/{id}/unfollow', 'UserController@unfollow')->name('unfollow');

Route::get('/user/lesson/category={category_id}&difficulty={difficulty}', 'LessonController@lesson_create')->name('lesson_create');
Route::get('/user/lesson/show/lesson={lesson_id}&index={index}', 'LessonController@lesson_show')->name('lesson_show');
Route::get('/user/lesson/answer/lesson={lesson_id}&index={index}&option={option_id}', 'LessonController@lesson_answer')->name('lesson_answer');
Route::get('/user/lesson/result/lesson={lesson_id}', 'LessonController@lesson_result')->name('lesson_result');
Route::get('/user/learned/{id}', 'LessonController@learned_words')->name('learned_words');
>>>>>>> Stashed changes
