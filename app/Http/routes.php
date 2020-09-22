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

Route::get('/', function () {
    return view('welcome');
});

Route::get('khoahoc', function(){
    return "route khoahoc";
});

Route::get('workshop', function(){
    echo 'route workshop';
});

Route::get('khoahoc/laravel', function(){
    return "route khoahoc/laravel";
});

Route::get('customer/{customerName}', function($customerName) {
    return "customer name: {$customerName}";
});

Route::get('receip/{date}/{id?}', function($date = '3456', $id='3'){
    return "the receip date: {$date} + {$id}";
})->where(['date'=>'[0-9]+']);

Route::get('route1', ['as'=>'myRoute', function(){
    return 'this is route1';
}]);

Route::get('route2', function(){
    return redirect()->route('myRoute');
})->name('myRoute2');

Route::get('route3', function(){
    return redirect()->route('myRoute2');
});

Route::group(['prefix'=>'user'], function(){
    Route::get('user1', function(){
        return 'user1';
    });

    Route::get('user2', function(){
        return 'user2';
    });
});

//goi controller
Route::get('GoiController', 'MyController@helloWorld');

Route::get('TruyenThamSo/{id}/{date}', 'MyController@getParam')->where(['id'=>'[0-9]+']);

Route::get('Request', 'MyController@getRequest');

Route::get('GetForm', function(){
    return view('postForm');
});

Route::get('GetForm2', 'MyController@getView');
Route::post('PostForm', ['as'=>'FormPost', 'uses'=>'MyController@postForm']);

//cookie vs request va response
Route::get('SetCookie/{param}', 'MyController@setCookie');
Route::get('GetCookie', 'MyController@getCookie');

//upload file
Route::get('PostFile', function(){
    return view('uploadFile');
});

Route::post('UploadFile', ['as'=>'UploadFile', 'uses'=>'MyController@uploadFile']);

//test Json
Route::get('get-json', 'MyController@GetJson');

//view
Route::get('get-view/{time}', function($time){
    return view('view-test-1',['tg'=>$time]);
});

Route::get('get-view-2/{time}', 'MyController@PushDataToView');
View::share('sharedParam', 'this is shared param');

//ptb2
Route::get('get-view-ptb2', function(){
    return view('caculus-form');
});

Route::post('ptb2',['as'=>'ptb2', 'uses'=>'MyController@CaculusPtb2']);

Route::get('test-blade', function(){
    return view('pages.bai1');
});

Route::get('get-master-blade', function(){
    return view('layouts.master');
});