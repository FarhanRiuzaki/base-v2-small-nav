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
    // return view('welcome');
    return redirect(route('login'));
});

Auth::routes();

//JADI INI GROUPING ROUTE, SEHINGGA SEMUA ROUTE YANG ADA DIDALAMNYA
//SECARA OTOMATIS AKAN DIAWALI DENGAN administrator
//CONTOH: /administrator/category ATAU /administrator/product, DAN SEBAGAINYA
Route::group(['prefix' => 'administrator', 'middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('apps/theme', 'AppsController@theme')->name('apps.theme');

    // API
        // import excel
            Route::get('/import_excel', 'ApisController@importExcel');

    Route::get('api/cif', 'ApisController@cif')->name('api.cif');           // get CIF
    Route::get('api/get_lc', 'ApisController@get_lc')->name('api.get_lc');  // get LC
    Route::get('api/mt700', 'ApisController@mt700')->name('api.mt700');     // get mt700
    Route::get('api/mt707', 'ApisController@mt707')->name('api.mt707');     // get mt707

    // PDF
    Route::get('/pdf/notifications-letter/{id}', 'ApisController@pdfNotifLetter')->name('api.pdfNotifLetter');
    Route::get('/pdf/nota-debet/{id}', 'ApisController@pdfNotaDebet')->name('api.pdfNotaDebet');
    // END DF

    //Route yang berada dalam group ini hanya dapat diakses oleh Admin|super-admin|User|Counter|Trade-maker|Trade-approver
    Route::group(['middleware' => ['role:Admin|super-admin']], function () {

        //route yang berada dalam group ini, hanya bisa diakses oleh user
        //yang memiliki permission yang telah disebutkan dibawah
        Route::group(['middleware' => ['permission:apps-show']], function() {
            // App setting
            Route::resource('apps', 'AppsController');
        });

        Route::group(['middleware' => ['permission:role-show']], function() {
            //ROLE
            Route::resource('roles', 'RolesController')->except([
                'create', 'show', 'edit', 'update'
            ]);
        });

        Route::group(['middleware' => ['permission:role permission-show']], function() {
            Route::post('/users/permission', 'UserController@addPermission')->name('users.add_permission');
            Route::get('/users/role-permission', 'UserController@rolePermission')->name('users.roles_permission');
            Route::put('/users/permission/{role}', 'UserController@setRolePermission')->name('users.setRolePermission');
        });

        Route::group(['middleware' => ['permission:users-show']], function() {
            // USER
            Route::resource('users', 'UserController')->except([
                'show'
            ]);
            Route::get('/users/roles/{id}', 'UserController@roles')->name('users.roles');
            Route::put('/users/roles/{id}', 'UserController@setRole')->name('users.set_role');
        });
    });

    //Route yang berada dalam group ini hanya dapat diakses oleh super-admin
    Route::group(['middleware' => ['role:super-admin']], function () {
        // MASTER
        Route::group(['middleware' => ['permission:master']], function() {
            //FLAG
            Route::resource('flag', 'MasterFlagController');
        });

        Route::group(['middleware' => ['permission:report-show']], function() {
            //TREASURY
            Route::get('/report/excel', 'ReportController@laporanExcel')->name('report.excel');
            Route::resource('report', 'ReportController');
        });

    });

// SETTING User
Route::get('/app-setting/{id}', 'UserController@editUser')->name('user_setting');
Route::put('/app-setting/{id}', 'UserController@updateUser')->name('update_user');

});

