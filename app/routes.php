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

//Route::get('/', function()
//{
//	return View::make('hello');
//});

Route::controller('admin','AdminController');
Route::filter('admin_is_login',function(){
    if(!Session::get('admin_is_login',0)){
        return Redirect::to('admin/login');
    }
});
Route::group(array('before' => 'admin_is_login'),function(){
    //后台主页面
 //   Route::get('Admin/index',array('as' => 'MusicIndex',function(){
   //     return View::make('Admin.index');
  //  }));
    Route::controller('music','MusicController');
    Route::controller('announcement','AnnouncementController');

});