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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth'])->group(function () {


	Route::get('/product/create', 'ProductController@create');
	Route::get('product/index', 'ProductController@index');
	Route::post('/product', 'ProductController@store');
	Route::get('/products/category/{slug}', 'ProductController@indexByCategory');
	Route::get('/product/{slug}', 'ProductController@show');
	Route::get('/product/edit/{id}', 'ProductController@edit');
	Route::patch('product/update/{id}', 'ProductController@update');
	Route::get('product/delete/{id}', 'ProductController@destroy');
	Route::get('/products/search', 'ProductController@search');
	Route::get('/products/available', 'ProductController@available');
	Route::get('/products/sold', 'ProductController@sold');
	Route::get('/products/pending', 'ProductController@pending');
	Route::get('/category', 'CategoryController@index');
	Route::post('/category/store', 'CategoryController@store');
	Route::post('/category/store_sub_category', 'CategoryController@store_sub_category');
	Route::get('category/show_all_categories','CategoryController@show_all_categories');
	Route::get('category/delete/{id}','CategoryController@destroy');
	Route::get('category/edit/{id}', 'CategoryController@edit');
	Route::patch('category/update/{id}','CategoryController@update');

	Route::post('dynamic_dependent/fetch','ProductController@fetch');

	Route::get('employee/create', 'EmployeeController@create');
	Route::post('employee/store', 'EmployeeController@store');
	Route::get('employee/index', 'EmployeeController@index');
	Route::get('employee/delete/{id}', 'EmployeeController@destroy');
	Route::get('employee/edit/{id}', 'EmployeeController@edit');
	Route::patch('employee/update/{id}', 'EmployeeController@update');

	Route::get('customer/create', 'CustomerController@create');
	Route::post('customer/store', 'CustomerController@store');

	Route::get('order/create', 'OrderController@create');
	Route::get('order/edit/{id}', 'OrderController@edit');

	Route::any('/search','CustomerController@search');
	Route::post('/searchOrder', 'OrderController@searchOrder');
	Route::post('/searchOrderCategory', 'OrderController@searchOrderCategory');


   	Route::get('add-to-cart/{id}/{customer_id}', 'OrderController@addToCart');
	Route::get('shopping-cart', 'OrderController@getCart');	

	Route::get('/reduce/{id}', 'OrderController@getReduceByOne');

	Route::get('/remove/{id}', 'OrderController@getRemoveItem');

	Route::get('/removeItems/{id}', 'OrderController@getRemoveItems');
	Route::post('/cartStore', 'OrderController@store');

	Route::patch('update-cart', 'OrderController@update');
 
	Route::delete('remove-from-cart', 'OrderController@remove');
	Route::post('/storeOrderCustomer','OrderController@store');



	Route::get('expense/create', 'ExpenseController@create');
	Route::get('expense/index', 'ExpenseController@index');
	Route::post('expense/store', 'ExpenseController@store');
	Route::get('expense/delete/{id}', 'ExpenseController@destroy');
	Route::get('expense/edit/{id}', 'ExpenseController@edit');
	Route::patch('expense/update/{id}', 'ExpenseController@update');
	Route::get('expense/salaries', 'ExpenseController@salaries');

	Route::get('asset/create', 'AssetsController@create');
	Route::get('asset/index', 'AssetsController@index');
	Route::post('asset/store', 'AssetsController@store');
	Route::get('asset/delete/{id}', 'AssetsController@destroy');
	Route::get('asset/edit/{id}', 'AssetsController@edit');
	Route::patch('asset/update/{id}', 'AssetsController@update');

	Route::get('investment/create', 'InvestmentController@create');
	Route::get('investment/index', 'InvestmentController@index');
	Route::post('investment/store', 'InvestmentController@store');
	Route::get('investment/delete/{id}', 'InvestmentController@destroy');
	Route::get('investment/edit/{id}', 'InvestmentController@edit');
	Route::patch('investment/update/{id}', 'InvestmentController@update');


	Route::get('fund/create', 'FundController@create');
	Route::get('fund/index', 'FundController@index');
	Route::post('fund/store', 'FundController@store');
	Route::get('fund/delete/{id}', 'FundController@destroy');
	Route::get('fund/edit/{id}', 'FundController@edit');
	Route::patch('fund/update/{id}', 'FundController@update');

	Route::get('revenue','ProfitlossController@revenue');
	Route::get('expenses','ProfitlossController@expenses');
	Route::get('profit','ProfitlossController@profit');
	Route::get('balancesheet','ProfitlossController@balancesheet');


});

