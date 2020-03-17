<?php

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider
| with the tenancy and web middleware groups. Good luck!
|
*/

Route::get('/app', function () {
    return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
});

Route::get('/app/login', 'Tenant_LoginController@show')->name('tenant_login')->middleware('guest');
Route::get('/app/register', 'RegistrationController@show')
    ->name('tenant_register')
    ->middleware('guest');


// Register & Login User
Route::post('/app/login', 'Tenant_LoginController@authenticate');
Route::post('/app/register', 'RegistrationController@register');

Route::get('/app/first', 'Tenant_HomeController@index')->name('first');

// Protected Routes - allows only logged in users
Route::middleware('auth')->group(function () {


    Route::get('/app/leads', 'LeadsController@index')->name('Leads');
    Route::post('/app/leads', 'LeadsController@store');

    Route::get('/app/get','GetController@index');
    Route::post('/app/get','GetController@add');

    Route::get('/app/accounts', 'AccountsController@index')->name('Accounts');
    Route::post('/app/accounts', 'AccountsController@store')->name('Accounts');

    Route::get('/app/Contacts', 'ContactsController@index')->name('Contacts');

    Route::get('/app/Reports', 'ReportsController@index')->name('Reports');

    Route::post('/app/logout', 'Tenant_LoginController@logout');
});









