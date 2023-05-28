<?php

use Illuminate\Support\Facades\Route;


Route::get('/owner','OwnerController@index')->name('home');
Route::get('/','OwnerController@index')->name('home');

Route::get('/owner/createOwner','OwnerController@createOwner')->name('createOwner');
Route::post('/owner','OwnerController@storeOwner')->name('storeOwner');
Route::get('/owner/cars/{cars}','OwnerController@show')->name('show');
Route::get('/owner/cars/{cars}/edit','OwnerController@edit')->name('edit');
Route::patch('/owner/{cars} ','OwnerController@update')->name('update');

Route::get('/owners/{owner}/edit','OwnerController@editOwner')->name('editOwner');
Route::patch('/owners/{owner} ','OwnerController@updateOwner')->name('updateOwner');
Route::delete('/owners/{owner}','OwnerController@deleteOwner')->name('deleteOwner');


Route::patch('/owner/cars/{cars}','OwnerController@flagUpdate')->name('flagUpdate');
Route::delete('/owner/cars/{cars}','OwnerController@delete')->name('delete');

Route::get('/owner/createCar/{owner}','OwnerController@createCar')->name('createCar');
Route::get('/owner/createCar','OwnerController@storeCar')->name('storeCar');

Route::get('/owner/allCars','OwnerController@allCars')->name('allCars');

Route::get('/owner/searchCar','OwnerController@searchCar')->name('searchCar');


/*Route::get('/owner/searchCar', 'ContactController@searchOwner')->name('searchOwner');
Route::post('/owner/searchCar', 'ContactController@searchCars')->name('searchCars');*/

