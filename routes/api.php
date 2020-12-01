<?php
//
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Route;
//
///*
//|--------------------------------------------------------------------------
//| API Routes
//|--------------------------------------------------------------------------
//|
//| Here is where you can register API routes for your application. These
//| routes are loaded by the RouteServiceProvider within a group which
//| is assigned the "api" middleware group. Enjoy building your API!
//|
//*/
//
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@authenticate');
Route::get('refresh', 'UserController@refresh');
Route::post('logout', 'UserController@logout');
Route::post('reset-password', 'UserController@resetPassword');
Route::get('open', 'DataController@open');

Route::post('create-voucher', 'VoucherController@store');
Route::get('get-all-vouchers', 'VoucherController@show');
Route::get('get-all-cash-vouchers', 'CashVoucherController@show');

Route::post('create-cash-voucher', 'CashVoucherController@store');
Route::get('get-vouchers-by-id/{id}', 'CashVoucherController@getVouchersById');

Route::get('get-count', 'CashVoucherController@getCount');
Route::post('approve-voucher/{id}', 'VoucherController@approve');

Route::post('buy-cash-voucher/{id}', 'BuyCashVoucherController@buyVoucher');
Route::post('buy-regular-voucher/{id}', 'BuyVoucherController@buyVoucher');

Route::get('get-purchased-cash-vouchers/{id}', 'BuyCashVoucherController@getCashVouchersById');
Route::get('get-purchased-regular-vouchers/{id}', 'BuyVoucherController@getRegularVouchersById');

Route::post('send-mail','MailSend@mailtoSendGift');



Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('user', 'UserController@getAuthenticatedUser');
    Route::get('closed', 'DataController@closed');




});





