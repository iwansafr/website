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
    return view('public.index');
});

Route::prefix('/admin')->middleware('auth')->group(function(){
    Route::get('/',function(){
        return view('dashboard.index');
    })->name('admin');
    Route::view('/user/role','dashboard.user.role');
    Route::view('/user/list','dashboard.user.list');
    
    Route::view('/menu/position','dashboard.menu.position');
    Route::view('/menu/list','dashboard.menu.list');

    Route::view('/category','dashboard.category.list');
    Route::view('/content/list','dashboard.content.list');
    Route::view('/content/edit','dashboard.content.edit');
    Route::get('/content/edit/{id}',function($id){
        return view('dashboard.content.edit',['content_id'=>$id]);
    });
    

    Route::view('/product/category','dashboard.product.category');
    Route::get('/product/category/{id}/list',function($id){
        return view('dashboard.product.list',['cat_id'=>$id]);
    });
    Route::view('/product/list','dashboard.product.list');
    Route::get('/product/edit/{id}',function($id){
        return view('dashboard.product.edit',['product_id'=>$id]);
    });
    Route::view('/product/edit','dashboard.product.edit');

    Route::view('/block/position','dashboard.block.position');

});

Route::view('login','auth.login')->name('login');
Route::view('logout','auth.logout')->name('logout');