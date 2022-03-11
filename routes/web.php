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

use App\Models\Post;
use App\resources\views\sample;

use App\Http\Controllers\email_writing;
use App\Http\Controllers\UserController;
use App\Http\Controllers\mod_fetch;
use Illuminate\Support\Facades\DB;

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
Route::get('/',function(){
    return "hello ";
});

Route::get('/AutoView','App\http\Controllers\AutoView@data');
Route::get('/at','App\http\Controllers\MockAi@nfcandidate');
Route::get('/mi','App\http\Controllers\MockAi@index');
Route::get('/avgscr','App\http\Controllers\MockAi@avgscore');
Route::get('/fpage','App\http\Controllers\MocAi@f');
Route::get('/chart','App\http\Controllers\MockAi@bar_chart');
Route::get('crt','App\http\Controllers\MockAi@view_call');
Route::get('er','App\http\Controllers\MockAi@getData');
Route::get('f_json','App\http\Controllers\MockAi@fetch_json');




Route::get('/all_mod','App\http\Controllers\MockAi@on_bntclick');
Route::get('/events','App\http\Controllers\MockAi@ins');
Route::get('/f_json','App\http\Controllers\MockAi@fetch_json');

//the code for chart......
Route::get('/chart','App\http\Controllers\MockAi@chrt');


Route::get('/trial','App\http\Controllers\MockAi@view_trial');
Route::get('/home','App\http\Controllers\MockAi@graph');


 