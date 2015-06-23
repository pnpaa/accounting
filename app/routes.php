<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/',['as' => 'index','uses' => 'DashController@frontPage']);
Route::get('login',['as' => 'viewlogin','uses' => 'SessionController@viewlogin']);
Route::post('login',['as' => 'login', 'uses' => 'SessionController@login']);
Route::post('auth',['as' => 'auth', 'uses' => 'SessionController@auth']);
Route::get('logout',['as' => 'logout','uses' => 'SessionController@logout']);
Route::post('contactUs',['before' => 'csrf', 'as' => 'contactUs','uses' =>'DashController@contactUs']);
Route::post('forgotPassword',['before' => 'csrf', 'as' => 'forgotPassword','uses' =>'DashController@forgotPassword']);
Route::get('check-question',['as' => 'check-question','uses' =>'DashController@checkQuestion']);
Route::post('verify-question',['before' => 'csrf', 'as' => 'verify-question','uses' =>'DashController@verifyQuestion']);
Route::post('new-pass',['before' => 'csrf', 'as' => 'new-pass','uses' =>'DashController@newPass']);


Route::group(['before' => 'auth'],function()
{
    Route::get('timeline',[ 'as' => 'timeline','uses' => 'DashController@timeline']);
    Route::get('analysis',[ 'as' => 'analysis','uses' => 'DashController@analysis']);
    Route::get('dashboard',[ 'as' => 'dashboard','uses' => 'DashController@index']);
    Route::get('lock',[ 'as' => 'lock','uses' => 'DashController@lock']);
    Route::get('forum',[ 'as' => 'forum','uses' => 'DashController@forum']);
    Route::get('receipts',[ 'as' => 'receipts','uses' => 'TransactionController@show']);
    Route::get('create-bulk',[ 'as' => 'create-bulk', 'uses' => 'UserController@createBulk']);
    Route::post('store-bulk','UserController@storeBulk');
    Route::post('filter',[ 'as' => 'filter','uses' => 'TransactionController@filter']);
    Route::get('export',[ 'as' => 'export','uses' => 'TransactionController@export']);
    Route::post('users/updatePhoto',[ 'as' => 'updatePhoto','uses' => 'UserController@updatePhoto']);
    Route::post('users/compare-password','UserController@comparePassword');
    Route::post('getData','DashController@data');
    Route::post('getTransactions',[ 'as' => 'getTransactions','uses' => 'DashController@transactions']);
    Route::post('reply',['before' => 'csrf','as' => 'reply','uses' => 'NotificationsController@reply']);
    Route::controller('dashboard','DashController');
    Route::controller('transactions','TransactionController');
    Route::resource('users','UserController');
    Route::resource('committee','CommitteeController');
    Route::resource('transaction','TransactionController');
    Route::resource('settings','SettingsController');
    Route::resource('updates','UpdatesController');
    Route::resource('notifications','NotificationsController');
    Route::resource('tasks','TaskController');
    Route::resource('updatesCategory','UpdatesCategoryController');
    Route::resource('trash','TrashController');
    Route::resource('folder','FolderController');
    Route::resource('mail','MailController');
    Route::controller('mailler','MailController');
    Route::post('get-updates','UpdatesController@getUpdates');
    Route::post('set-update','UpdatesController@update');
});


App::missing(function($exception){
return Response::view('not-found', array(),404);
});

