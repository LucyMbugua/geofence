<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
/* Routes accessible before logging in */
Route::group(array("before" => "guest"), function()
{
	Route::any('/', array(
	    "as" => "auth.login",
	    "uses" => "WelcomeController@index"
	));

    Route::any('user/login', array(
	    "as" => "user.login",
	    "uses" => "Auth\AuthController@postLogin"
	));
    
});

//	User controller
Route::resource('user', 'UserController');
Route::get("/user/{id}/delete", array(
    "as"   => "user.delete",
    "uses" => "UserController@delete"
));


//	Geofence controller
Route::resource('geofence', 'GeofenceController');
Route::get("/geofence/{id}/delete", array(
    "as"   => "geofence.delete",
    "uses" => "GeofenceController@delete"
));

//	GeoLocation controller
Route::resource('geolocation', 'GeoLocationController');
Route::get("/geolocation/{id}/delete", array(
    "as"   => "geolocation.delete",
    "uses" => "GeolocationController@delete"
));
//	County controller
Route::resource('county', 'CountyController');
Route::get("/county/{id}/delete", array(
    "as"   => "county.delete",
    "uses" => "CountyController@delete"
));

//	SubCounty controller
Route::resource('subCounty', 'SubCountyController');

Route::get("/subCounty/{id}/delete", array(
    "as"   => "subCounty.delete",
    "uses" => "SubCountyController@delete"
));
//  Ward controller
Route::resource('ward', 'WardController');

Route::get("/ward/{id}/delete", array(
    "as"   => "ward.delete",
    "uses" => "WardController@delete"
));

//  Role controller
Route::resource('role', 'RoleController');
//  Permission controller
Route::resource('permission', 'PermissionController');
//  Privilege controller
Route::resource('privilege', 'PrivilegeController');
//  Authorization controller
Route::resource('authorization', 'AuthorizationController');

