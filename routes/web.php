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

//backend
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'AdminController@show_dashboard');
Route::post('/admin-dashboard', 'AdminController@dashboard');
Route::get('/logout', 'AdminController@logout');
//category
Route::get('/admin-category', 'AddCategory@index');
Route::post('/admin-addcategory', 'AddCategory@addcategory');
Route::get('/admin-editcategory/{id_cate_select}', 'AddCategory@editcategory');
Route::get('/admin-deletecategory/{id_cate_select}', 'AddCategory@deletecategory');
Route::post('/admin-updatecategory/{id_cate_select}', 'AddCategory@updatecategory');
//product
Route::get('/admin-product', 'CategoryProduct@index');
Route::post('/admin-addproduct', 'CategoryProduct@addproduct');
Route::get('/admin-editproduct/{id_pro_select}', 'CategoryProduct@editproduct')->name('edit.product');
Route::get('/admin-deleteproduct/{id_pro_select}', 'CategoryProduct@deleteproduct');
Route::post('/admin-updateproduct/{id_pro_select}', 'CategoryProduct@updateproduct');
//ajax search product
Route::post('/admin-searchproduct', 'CategoryProduct@getSearchAjax');
//cart
Route::get('/admin-cart', 'AddCart@index');
Route::post('/admin-cartsearchproduct', 'AddCart@getSearchAjax');
Route::post('/admin-cartaddproduct', 'AddCart@addCartAjax');
Route::post('/admin-cartmakeorder', 'AddCart@MakeOrder');
Route::post('/admin-cartcustomer', 'AddCart@getSearchCustomer');
Route::post('/admin-cart_selectcustomer', 'AddCart@selectcustomer');
// frontend
Route::get('/', 'HomeController@index');

Route::get('/trang-chu', 'HomeController@index');