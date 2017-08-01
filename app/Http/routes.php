<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Admin Check Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin', function () {
    if(Auth::check()) {
        return Redirect::to('admin-check');
    }
    return Redirect::to('login');
});

Route::get('admin-check',function(){

    if(Auth::user()->isActive() && Auth::user()->isAdmin()) {
        return redirect('admin-posts');
    }
    return View::make('welcome');
});

/*
|--------------------------------------------------------------------------
| Admin Posts Routes
|--------------------------------------------------------------------------
*/

Route::resource('admin-posts','AdminPostsController');
Route::get('/admin-posts-delete/{id}', array(
    'uses' => 'AdminPostsController@destroy',
    'as' => 'admin-posts.delete',
));

Route::get('/admin-post/{id}/feature-image',array(
    'uses' => 'AdminPostsController@featureImage',
    'as' => 'admin-post.feature-image',
));

Route::patch('/admin-post/{id}/feature-image-process',array(
    'uses' => 'AdminPostsController@featureImageProcess',
    'as' => 'admin-post.feature-image-process',
));

/*
|--------------------------------------------------------------------------
| Admin Categories Routes
|--------------------------------------------------------------------------
*/
Route::resource('admin-categories','AdminCategoriesController');

/*
|--------------------------------------------------------------------------
| Admin Photos Categories Routes
|--------------------------------------------------------------------------
*/
Route::resource('admin-photos-categories','AdminPhotosCategoriesController');

/*
|--------------------------------------------------------------------------
| Admin Photos Routes
|--------------------------------------------------------------------------
*/
Route::resource('admin-photos','AdminPhotosController');
Route::get('/admin-photo-delete/{id}', array(
    'uses' => 'AdminPhotosController@destroy',
    'as' => 'admin-photo.delete',
));
/*
|--------------------------------------------------------------------------
| Admin References Routes
|--------------------------------------------------------------------------
*/
Route::resource('admin-references','AdminReferencesController');

/*
|--------------------------------------------------------------------------
| Admin Votes Routes
|--------------------------------------------------------------------------
*/
Route::resource('admin-votes','AdminVotesController');
Route::get('/admin-vote-delete/{id}', array(
    'uses' => 'AdminVotesController@destroy',
    'as' => 'admin-vote.delete',
));

/*
|--------------------------------------------------------------------------
| Admin Users Routes
|--------------------------------------------------------------------------
*/

Route::resource('admin-users','AdminUsersController');
Route::get('/admin-user-delete/{id}', array(
   'uses' => 'AdminUsersController@destroy',
    'as' => 'admin-user.delete',
));

Route::get('/admin-user/{id}/change-password', array(
    'uses' => 'AdminUsersController@changePassword',
    'as' => 'admin-user.change-password',
));

Route::patch('admin-user/{id}/change-password-process', array(
   'uses' => 'AdminUsersController@changePasswordProcess',
    'as' => 'admin-user.change-password-process',
));



/*
|--------------------------------------------------------------------------
| Front-end Routes
|--------------------------------------------------------------------------
*/
Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/','FrontController@index');

Route::get('/built-environment','FrontController@buildEnvironment');

Route::get('/renewable-energy','FrontController@renewableEnergy');

Route::get('/impact-on-health','FrontController@impactOnHealth');

Route::get('/climate-change','FrontController@climateChange');

Route::get('/photos-gallery','FrontController@photos');

Route::get('/references','FrontController@references');

Route::post('/vote-ajax','FrontController@voteAjax');

Route::post('/vote-result-ajax','FrontController@voteResultAjax');
