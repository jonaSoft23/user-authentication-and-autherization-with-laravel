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

Route::get('/app/first', function () {
    return view('first');
})->name('first');

/* Route::get('/app/tenant_login', 'tenant_loginController@index')->name('Tenant_login'); */

Route::get('/app/leads', 'LeadsController@index')->name('Leads');
Route::post('/app/leads', 'LeadsController@store');

Route::get('/app/get','GetController@index');
Route::post('/app/get','GetController@add');

Route::get('/app/accounts', 'AccountsController@index')->name('Accounts');
Route::post('/app/accounts', 'AccountsController@store')->name('Accounts');

Route::get('/app/Contacts', 'ContactsController@index')->name('Contacts');

Route::get('/app/Reports', 'ReportsController@index')->name('Reports');
