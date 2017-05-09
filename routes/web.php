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

//store display get routes
Route::get('/','storecontroller@check');
Route::get('registers','storecontroller@check');
Route::get('/all','storecontroller@paging')->middleware('auth');
Route::get('/opened','storecontroller@opened')->middleware('auth');
Route::get('/closed','storecontroller@closed')->middleware('auth');
Route::get('/search','storecontroller@paging')->middleware('auth');
Route::get('/displayall',['uses'=>'storecontroller@paging','as'=>'displayall'])->middleware('auth');
Route::get('/singlestatus','storecontroller@paging')->middleware('auth');
Route::get('/multiplestatus','storecontroller@paging')->middleware('auth');
Route::get('/logout','storecontroller@logout');

//store display post routes
Route::post('/open','storecontroller@open')->middleware('auth');
Route::post('/close','storecontroller@close')->middleware('auth');
Route::post('/displayall',['uses'=>'storecontroller@paging','as'=>'displayall'])->middleware('auth');
Route::post('/singlestatus','storecontroller@singlestatus')->middleware('auth');
Route::post('/multiplestatus','storecontroller@multiplestatus')->middleware('auth');
Route::post('/search','storecontroller@search')->middleware('auth');


// 

//store reports get routes
Route::get('/reports','reportcontroller@todayreports')->middleware('auth');
Route::get('/daily','reportcontroller@daily')->middleware('auth');
Route::get('/weekly','reportcontroller@weekly')->middleware('auth');
Route::get('/monthly','reportcontroller@monthly')->middleware('auth');
Route::get('/yearly','reportcontroller@yearly')->middleware('auth');


Auth::routes();
Route::get('/home', 'storecontroller@paging')->middleware('auth');
