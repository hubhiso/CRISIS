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
    

    Route::post('/reject_cfm', 'ManagerController@reject_cfm')->name('manager.reject_cfm');
    Route::post('/transfer_cfm', 'ManagerController@transfer_cfm')->name('manager.transfer_cfm');
   

    Route::prefix('transfer_case')->group(function (){
        Route::get('ajax-amphur/{prov_id}','ManagerController@ajax_amphur');
    });

    Route::get('/share_case/{case_id}', 'ManagerController@share_case')->name('manager.share_case');
    Route::post('/manage_sharecase', 'ManagerController@manage_sharecase')->name('manager.manage_sharecase');
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

    Route::get('/load_view_operate/{operate_id}', 'OfficerInputController@view_operate')->name('officer.view_operate');

    Route::get('/load_edit_detail2/{case_id}', 'OfficerInputController@edit_detail2')->name('officer.edit_detail2');

    Route::get('/view_detail2/{case_id}', 'OfficerInputController@view_detail2')->name('officer.view_detail2');
    Route::get('/view_activities/{case_id}', 'OfficerInputController@view_activities')->name('officer.view_activities');


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

    Route::get('/contact', 'ContactController@contact');
    
    Route::get('/guide_t', 'ContactController@guide_t')->name('officer.guide_t');
    Route::post('/update_count', 'ContactController@update_count')->name('officer.update_count');

    Route::get('/printcase/{case_id}', 'OfficerUpdateController@printcase')->name('officer.printpage');

    Route::get('/m_officer', 'ManageofficerController@m_officer')->name('officer.m_officer');
    Route::post('m_officer', 'ManageofficerController@m_officer')->name('m_officer');

    Route::resource('/e_officer', 'ManageofficerController');

    Route::get('/logOfficer', 'ManageofficerController@view_log')->name('officer.view_log');
    Route::resource('/creategroup', 'ManageofficerController');

    Route::get('/email', 'EmailController@create');
    Route::post('/email', 'EmailController@sendEmail')->name('send.email');

    Route::post('/exportexcel', 'OfficerUpdateController@exportexcel')->name('officer.Export_Excel');

    Route::get('/verifydata', 'OfficerUpdateController@showverifydata')->name('officer.verifydata');

    Route::get('/view_officer', 'ManageofficerController@view_officer')->name('officer.view_officer');

    //Route::post('/emailapprov', 'EmailController@sendEmailapprov')->name('send.emailapprov');

});

Route::get('status', function () {
    return view('layout.status');
});
Route::get('status/{case_id}', 'case_controller@show')->name('case.status');
Route::post('evaluate', 'case_controller@up_evaluate')->name('case.update');

Route::post('/store', 'case_controller@store')->name('store');

Route::get('/register', 'RegisterController@load_register')->name('register');

Route::post('/register_cfm', 'RegisterController@create_officer')->name('register_cfm');

Route::get('ajax-email-regis/{email}','RegisterController@ajax_email');
Route::get('ajax-tel-regis/{tel}','RegisterController@ajax_tel');



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
Route::get('manageu', function () {
    return view('officer.manageuser');
});

Route::get('/orgmap', function () {
    return view('orgmap');
});

Route::get('change/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return Redirect::back();
});

Route::get('check-model','ContactController@getIndex');

Route::get('/resource', function () {
    return view('resource');
});

//Route::post('/store', 'case_controller@store')->name('store');

Route::get('/createusersuccess', function () {
    return view('createusersuccess');
});




