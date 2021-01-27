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

/*
Route::get('/test', function(){
	return view('test');
});
*/

Route::get('/login', [
	'middleware'=>'loginauth2',
	'uses'=>'UserController@view'
]);
Route::post('/loginpost', [
	'middleware'=>'loginauth2',
	'uses'=>'UserController@check'
]);
Route::get('/', [
	'middleware'=>'loginauth',
	'uses'=>'DailyController@view'
]);
Route::get('/dailysearch', [
	'middleware'=>'loginauth',
	'uses'=>'DailyController@bydate'
]);
Route::get('/filter', [
	'middleware'=>'loginauth',
	'uses'=>'FilterController@view'
]);
Route::get('/filtersearch', [
	'middleware'=>'loginauth',
	'uses'=>'FilterController@bydate'
]);
Route::get('/addbuydata', [
	'middleware'=>'loginauth',
	'uses'=>'AddBuyController@view'
]);
Route::get('/addselldata', [
	'middleware'=>'loginauth',
	'uses'=>'AddSellController@view'
]);
Route::post('/submitbuydata', [
	'middleware'=>'loginauth',
	'uses'=>'AddBuyController@addOneBuyData'
]);
Route::post('/submitselldata', [
	'middleware'=>'loginauth',
	'uses'=>'AddSellController@addOneSellData'
]);
Route::get('/stocks', [
	'middleware'=>'loginauth',
	'uses'=>'StocksController@view'
]);
Route::get('/nearexpstocks', [
	'middleware'=>'loginauth',
	'uses'=>'NearExpStocksController@view'
]);
Route::get('/patiencedatas', [
	'middleware'=>'loginauth',
	'uses'=>'PatienceDatasController@view'
]);
Route::get('/patiencescv/{id}', [
	'middleware'=>'loginauth',
	'uses'=>'PatiencesCVController@view'
]);
Route::get('/logout', 'LogoutController@logout');