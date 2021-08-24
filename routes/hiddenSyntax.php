<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| hiddenSyntax Routes
|--------------------------------------------------------------------------
|
| Here is where you can register hiddenSyntax routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "hiddenSyntax" middleware group. Enjoy building your payment confirm!
|
*/



Route::post('g101', 'Gateway\g101\ProcessController@ipn')->name('g101'); // paypal
Route::post('g102', 'Gateway\g102\ProcessController@ipn')->name('g102'); // Perfect Money
Route::post('g104', 'Gateway\g104\ProcessController@ipn')->name('g104'); // Skrill


Route::post('g105', 'Gateway\g105\ProcessController@ipn')->name('g105'); // PayTM
Route::post('g107', 'Gateway\g107\ProcessController@ipn')->name('g107'); // PayStack
Route::post('g111', 'Gateway\g111\ProcessController@ipn')->name('g111'); // stripeJs
Route::get('g115', 'Gateway\g115\ProcessController@ipn')->name('g115'); // Mollie

Route::get('g501', 'Gateway\g501\ProcessController@ipn')->name('g501'); // Blockchain
Route::get('g502', 'Gateway\g502\ProcessController@ipn')->name('g502'); // Block.io
Route::post('g503', 'Gateway\g503\ProcessController@ipn')->name('g503'); // CoinPayment
Route::post('g504', 'Gateway\g504\ProcessController@ipn')->name('g504'); // CoinPayment ALL
Route::post('g505', 'Gateway\g505\ProcessController@ipn')->name('g505'); // Coingate
Route::post('g506', 'Gateway\g506\ProcessController@ipn')->name('g506'); // Coinbase commerce







