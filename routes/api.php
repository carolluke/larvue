<?php
use Illuminate\Http\Request;

    Route::post('login', 'UserController@login');
    Route::post('signup', 'UserController@signup');
  
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'UserController@logout');
        Route::get('user', 'UserController@user');
        Route::post('company', 'CompanyController@addCompany');
        Route::get('companies', 'CompanyController@index');
        
    });