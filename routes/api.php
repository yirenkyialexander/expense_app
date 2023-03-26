<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::namespace('API')->group(function () {
    Route::post('AttemptLogin', 'AuthController@AttemptLogin');
    Route::post('register', 'AuthController@register');
    Route::post('loginViaOtp', 'AuthController@loginViaOtp');
    Route::post('forgot', 'ForgotController@forgot');
    Route::post('reset', 'ForgotController@reset');
    

    Route::middleware(['auth:api'])->group(function () {
    // User Update and related activity
    Route::get('getProfile', 'AuthController@getProfile');
    Route::get('logout', 'AuthController@logout');
    Route::post('updateProfile', 'AuthController@updateProfile');
    Route::post('updateUsertype/{id}', 'AuthController@updateUsertype');
    Route::post('category', 'ExpenseCategoryController@category');
    Route::post('createExpense', 'ExpenseController@createExpense');
    Route::get('allCategoriesPerUser', 'ExpenseController@allCategoriesPerUser');
    Route::get('getAllExpense', 'ExpenseController@getAllExpense');
    Route::post('addBank', 'BankController@adddBank');
    Route::get('getBankPerUser', 'BankController@getBankPerUser');
    Route::get('getCateList', 'ExpenseCategoryController@getCateList');
    Route::post('SubCategory', 'ExpenseSubCategoryController@SubCategory');
    Route::get('getCatePerSubCateList/{category_id}', 'ExpenseSubCategoryController@getCatePerSubCateList');
       });
   });       