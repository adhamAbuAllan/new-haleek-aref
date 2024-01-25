<?php

use App\Http\Controllers\CarCategoryController;
use App\Http\Controllers\CarModelController;
use App\Http\Controllers\CategoryCompanyController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\MediatorCarModelCategoryController;
use App\Http\Controllers\MediatorCompanyCategoryController;
use App\Http\Controllers\MediatorModelCarCompanyCategoryCategoryController;
use App\Http\Controllers\PhotoController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//add//
Route::post('/company/add',[CompanyController::class,'add']);
Route::post('/company-category/add',[CategoryCompanyController::class,'add']);
Route::post('/car-model-category/add',[CarCategoryController::class,'add']);
Route::post('/car-model/add',[CarModelController::class,'add']);
Route::post('/photo/add',[PhotoController::class,'addImages']);

//all//
Route::get('/company/all',[CompanyController::class,'all']);
Route::get('/company-category/all',[CategoryCompanyController::class,'all']);
Route::get('/car-model-category/all',[CarCategoryController::class,'all']);
Route::get('/car-model/all',[CarModelController::class,'all']);

//one//
Route::post('/company/one',[CompanyController::class,'one']);

//insert//
Route::get('/mediator-car-model-category/insert',[MediatorCarModelCategoryController::class,'insert']);
Route::get('/mediator-company-category/insert',[MediatorCompanyCategoryController::class,'insert']);
Route::get('/mediator-model-car-company-category/insert',[MediatorModelCarCompanyCategoryCategoryController::class,'insert']);
