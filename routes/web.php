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

Route::get('/', function () {
    return view('index');
})->name('guest_home');;

Auth::routes();
Route::prefix('manager')->group(function (){
    Route::get('/reject_case/{case_id}', 'ManagerController@reject')->name('manager.reject_frm');
    Route::get('/transfer_case/{case_id}', 'ManagerController@transfer')->name('manager.transfer_frm');
    Route::get('/register', 'ManagerController@load_register')->name('manager.register');

    Route::post('/reject_cfm', 'ManagerController@reject_cfm')->name('manager.reject_cfm');
    Route::post('/transfer_cfm', 'ManagerController@transfer_cfm')->name('manager.transfer_cfm');
    Route::post('/register_cfm', 'ManagerController@create_officer')->name('manager.register_cfm');
});
Route::prefix('officer')->group(function () {
    Route::get('/', 'OfficerController@index')->name('officer.main');
    Route::get('/show/{mode_id}', 'OfficerInputController@show')->name('officer.show');
    Route::get('/load_status/{prov_id}', 'OfficerInputController@load_status')->name('officer.load_status');
    Route::get('/confirm/{case_id}', 'OfficerInputController@open_confirm')->name('officer.open_cfm');
    Route::get('/only_detail/{case_id}', 'OfficerInputController@open_detail')->name('officer.open_dt');

    Route::get('/password/reset', 'Auth\UserForgotPasswordController@showLinkRequestForm')->name('officer.password.request');
    Route::get('/password/reset/{token}', 'Auth\UserResetPasswordController@showResetForm')->name('officer.password.reset');

    Route::get('/add_detail/{case_id}', 'OfficerInputController@add_detail')->name('officer.add_detail');
    Route::get('/add_activities/{case_id}', 'OfficerInputController@add_activities')->name('officer.add_activities');
    Route::get('/load_activities/{case_id}', 'OfficerInputController@load_activities_table')->name('officer.load_activities');
    Route::get('/load_edit_operate/{operate_id}', 'OfficerInputController@edit_operate')->name('officer.edit_operate');
    Route::get('/load_edit_detail2/{case_id}', 'OfficerInputController@edit_detail2')->name('officer.edit_detail2');

  //  Route::post('/password/email', 'UserForgotPasswordController@sendResetLinkEmail')->name('officer.password.email');
  //  Route::post('/password/reset', 'UserResetPasswordController@reset');

    Route::post('/update_operate', 'OfficerUpdateController@update_operate')->name('officer.update_operate');
    Route::post('/load_case', 'OfficerUpdateController@load_case')->name('officer.load_case');
    Route::post('/add_detail', 'OfficerUpdateController@add_detail')->name('officer.post_detail');
    Route::post('/update_detail', 'OfficerUpdateController@update_detail')->name('officer.update_detail');
    Route::post('/add_activities', 'OfficerUpdateController@add_activities')->name('officer.post_activities');
    Route::post('/update_case_operate', 'OfficerUpdateController@update_operate_case')->name('officer.update_case');
    Route::post('/accept', 'OfficerUpdateController@accept_case')->name('officer.accept_c');

    Route::get('/login', 'Auth\OfficerLoginController@ShowLoginForm')->name('officer.login');
    Route::post('/login', 'Auth\OfficerLoginController@login')->name('officer.login.submit');
    Route::post('/logout', 'Auth\OfficerLoginController@logout')->name('officer.logout');
    Route::resource('input_case','OfficerInputController');
    Route::get('ajax-amphur/{prov_id}','OfficerInputController@ajax_amphur');

});

Route::get('status', function () {
    return view('layout.status');
});
Route::get('status/{case_id}', 'case_controller@show')->name('case.status');
Route::post('evaluate', 'case_controller@up_evaluate')->name('case.update');

Route::post('/store', 'case_controller@store')->name('store');



Route::get('manage', function () {
    return view('officer.manageCase');
});
Route::get('detail1', function () {
    return view('officer.detail1');
})->name('data.detail1');
Route::get('detail2', function () {
    return view('officer.detail2');
})->name('data.detail2');

Route::get('activities', function () {
    return view('officer.activities');
})->name('data.detail3');

Route::get('ajax-amphur/{prov_id}','case_controller@ajax_amphur');

Route::resource('case_inputs','case_controller');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/support', function () {
    return view('support');
});
Route::get('support2', function () {
    return view('support');
});
Route::get('/orgmap', function () {
    return view('orgmap');
});
