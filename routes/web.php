<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/product/category', 'ProductController@productCategory')->name('product-category');
Route::post('/product/category', 'ProductController@createProductCategory')->name('product-category');
Route::get('/edit-product-category/{id}', 'ProductController@editProductCategory')->name('edit-product-category');
Route::get('/delete-product-category/{id}', 'ProductController@deleteProductCategory')->name('delete-product-category');

Route::get('product-name', 'ProductController@ProductName')->name('product-name');
Route::post('product-name', 'ProductController@createProductName')->name('product-name');
Route::get('edit-product-name/{id}', 'ProductController@editProductName')->name('edit-product-name');
Route::get('delete-product-name/{id}', 'ProductController@deleteProductName')->name('delete-product-name');

Route::get('operation-category', 'OperationController@operationCategory')->name('operation-category');
Route::post('operation-category', 'OperationController@createOperationCategory')->name('operation-category');
Route::get('edit-operation-category/{id}', 'OperationController@editOperationCategory')->name('edit-operation-category');
Route::get('delete-operation-category/{id}', 'OperationController@deleteOperationCategory')->name('delete-operation-category');

Route::get('operation-name', 'OperationController@operationName')->name('operation-name');
Route::post('operation-name', 'OperationController@createOperationName')->name('operation-name');
Route::get('edit-operation-name/{id}', 'OperationController@editOperationName')->name('edit-operation-name');
Route::get('delete-operation-name/{id}', 'OperationController@deleteOperationName')->name('delete-operation-name');

Route::get('patient', 'PatientController@patient')->name('patient');
Route::post('patient', 'PatientController@createPatient')->name('patient');
Route::get('edit-patient/{id}', 'PatientController@editPatient')->name('edit-patient');
Route::get('delete-patient/{id}', 'PatientController@deletePatient')->name('delete-patient');


