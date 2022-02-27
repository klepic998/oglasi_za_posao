<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureUserHasRole;

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



Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

Route::get('/post/{post}','App\Http\Controllers\PostController@show')->name('post');

//Pretraga
Route::get('/search','App\Http\Controllers\SearchController@search')->name('search');
Route::get('/search/category/{id}','App\Http\Controllers\SearchController@index')->name('search.category');

//Komentari

Route::post('post/{id}/comment','App\Http\Controllers\CommentController@store')->name('store.comment');
//Notifikacija
Route::get('/send/{post}','App\Http\Controllers\SendNotificationController@sendnotification')->name('sendnotification.user');
Route::get('/post/view/{post}','App\Http\Controllers\SendNotificationController@showpost')->name('show.users.post');


Auth::routes();

Route::get('/verify','App\Http\Controllers\Auth\RegisterController@verifyUser')->name('verify.user');

Route::middleware('auth')->group(function(){
    //Pregled korisnickog profila
        Route::get('/user/profile', 'App\Http\Controllers\UserController@show')->name('user.profile');
    //Pregled oglasa korisnika
        Route::get('/user/posts', 'App\Http\Controllers\UserController@index')->name('user.posts');
    //Kreiranje novog oglasa
        Route::get('/user/create/post', 'App\Http\Controllers\UserController@create')->name('user.createpost');
        Route::post('/user/posts','App\Http\Controllers\UserController@store')->name('userspost.store');
    //Uredjivanje oglasa
        Route::get('user/posts/{post}/edit', 'App\Http\Controllers\UserController@edit')->name('userspost.edit');
        Route::patch('/user/posts/{post}/update','App\Http\Controllers\UserController@update')->name('userspost.update');
    //Brisanje oglasa
        Route::delete('/user/posts/{post}/delete','App\Http\Controllers\UserController@destroy')->name('userspost.destroy');
    //Brisanje profila
    Route::delete('/user/{user}/delete','App\Http\Controllers\UserController@destroyuser')->name('profile.delete');

    //Editovanje profila
    Route::get('user/{user}/edit', 'App\Http\Controllers\UserController@editProfile')->name('edit.profile');
    //Ažuriranje profila
    Route::patch('user/{user}/update', 'App\Http\Controllers\UserController@updateProfile')->name('update.profile');


});
Route::middleware(['role:admin','auth'])->group(function(){
    //Admin panel
        Route::get('/admin', 'App\Http\Controllers\AdminsController@index')->name('admin.index');
        //Oglasi
            //Kreiranje novog oglasa
            Route::get('/admin/posts/create', 'App\Http\Controllers\PostController@create')->name('post.create');
            Route::post('/admin/posts','App\Http\Controllers\PostController@store')->name('post.store');
            //Pregled svih oglasa
            Route::get('/admin/posts', 'App\Http\Controllers\AdminsController@showposts')->name('posts.index');
            //Brisanje oglasa
            Route::delete('/admin/posts/{post}/delete','App\Http\Controllers\PostController@destroy')->name('post.destroy');
            //Uredjivanje oglasa
            Route::get('admin/posts/{post}/edit', 'App\Http\Controllers\PostController@edit')->name('post.edit');
            Route::patch('/admin/posts/{post}/update','App\Http\Controllers\PostController@update')->name('post.update');

        // Kategorije
            //Kreiranje kategorije
            Route::get('admin/categories/create', 'App\Http\Controllers\CategoryController@create')->name('category.create');
            Route::post('admin/categories/store', 'App\Http\Controllers\CategoryController@store')->name('category.store');

            //Pregled svih kategorija
            Route::get('/admin/categories', 'App\Http\Controllers\CategoryController@index')->name('category.index');

            //Brisanje kategorije
            Route::delete('/admin/categories/{category}/delete','App\Http\Controllers\CategoryController@destroy')->name('category.destroy');

            //Uredjivanje kategorije
            Route::get('admin/categories/{category}/edit', 'App\Http\Controllers\CategoryController@edit')->name('category.edit');
            Route::patch('/admin/categories/{category}/update','App\Http\Controllers\CategoryController@update')->name('category.update');
        //Korisnici
            //Pregled svih korisnika
            Route::get('/admin/users', 'App\Http\Controllers\AdminsController@show')->name('users.index');
            //Brisanje korisnika
            Route::delete('/admin/users/{user}/delete', 'App\Http\Controllers\AdminsController@destroy')->name('user.delete');
            //Oglasi izabranog korisnika
        //Izbor korisnika
        Route::get('/admin/chooseuser','App\Http\Controllers\AdminsController@chooseuser')->name('choose.user');
        //Učitavanje svih oglasa odabranog korisnika
        Route::get('admin/user/posts','App\Http\Controllers\AdminsController@showusersposts')->name('users.posts');
        //Učitavanje pojedinačnog oglasa korisnika
        Route::get('/admin/user/{post}','App\Http\Controllers\AdminsController@postdetails')->name('users.post');

        //Komentari
            //Svi komentari
            Route::get('/admin/comments','App\Http\Controllers\CommentController@index')->name('comments.show');
            //Brisanje komentara
            Route::delete('/admin/comments/{comment}/delete', 'App\Http\Controllers\CommentController@destroy')->name('comment.delete');

        //Linkovi
            //Uslovi korištenja
            Route::get('/admin/terms&conditions', 'App\Http\Controllers\AdminsController@showterms')->name('show.terms');
            //Politika privatnosti
            Route::get('/admin/privacypolicy', 'App\Http\Controllers\AdminsController@showpp')->name('show.pp');

});

