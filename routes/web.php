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




Route::get('/', [
    'uses'=> 'HomeController@landingPage',
    'as' => 'Landing'
    
]);
  



/**
*  Grouping of Auth Middleware
*/

Route::group(['middleware' => ['guest']], function () {
    

    
    
/*
*  AUTHENTICATION
*/
Route::get('/Register', [
    'uses'=> 'AuthController@getSignUp',
    'as' => 'Register'
    
]);
Route::post('/Register', [
    'uses'=> 'AuthController@postSignUp',
    'as' => 'Register'
    
]);
Route::get('/Login', [
    'uses'=> 'AuthController@getSignIn',
    'as' => 'Login'
    
]);
Route::post('/Login', [
    'uses'=> 'AuthController@postSignIn',
    'as' => 'Login'
    
]);


    
    
    
    
    
    
    
    
});





/**
*  Grouping of Auth Middleware
*/

Route::group(['middleware' => ['auth']], function () {
    
/*
*  HOME
*/
Route::get('/home', [
    'uses'=> 'HomeController@index',
    'as' => 'Home'
    
]);
  
 
    
    
    
Route::get('/Logout', [
    'uses'=> 'AuthController@userSignOut',
    'as' => 'Logout'
    
]);
    
    

/*
*  Studio
*/
Route::get('/MyStudio', [
    'uses'=> 'StudioController@GetMyStudio',
    'as' => 'MyStudio'
    
]);
Route::get('/Studio/{id}', [
    'uses'=> 'StudioController@GetStudioPage',
    'as' => 'GetStudio'
    
]);
Route::get('/CreateStudio', [
    'uses'=> 'StudioController@createStudioPage',
    'as' => 'CreateStudio'
    
]);
Route::post('/CreateStudio', [
    'uses'=> 'StudioController@submitStudioData',
    'as' => 'CreateStudio'
    
]);
Route::get('/Edit', [
    'uses'=> 'StudioController@editStudioInfo',
    'as' => 'editStudioInfo'
    
]);
Route::post('/Edit', [
    'uses'=> 'StudioController@updateStudioInfo',
    'as' => 'updateStudioInfo'
    
]);

Route::post('/TimeSlots', [
    'uses'=> 'StudioController@createTimeSlots',
    'as' => 'createTimeSlots'
    
]);
    

/*
*  Search
*/
Route::post('/Search', [
    'uses'=> 'SearchController@searchStudio',
    'as' => 'SearchStudio'
    
]);
Route::get('/AdvanceSearch', [
    'uses'=> 'SearchController@getAdvanceSearchPage',
    'as' => 'AdvanceSearch'
    
]);
Route::post('/AdvanceSearch', [
    'uses'=> 'SearchController@searchByFilter',
    'as' => 'AdvanceSearch'
    
]);
    
    
    
/*
*  Ticket
*/
Route::post('/BookTicket', [
    'uses'=> 'TicketController@bookStudioTicket',
    'as' => 'BookTicket'
    
]);
Route::get('/BookingHistory', [
    'uses'=> 'TicketController@ticketBookingHistory',
    'as' => 'BookingHistory'
    
]);
Route::get('/BookedTickets', [
    'uses'=> 'TicketController@BookedTickets',
    'as' => 'BookedTickets'
    
]);    
    
    
    

    
    
    
});








