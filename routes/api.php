<?php

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\MediaController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\Api\UserController;
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

Route::get('slider', [MediaController::class, 'sliders']);
Route::get('articles', [ArticleController::class, 'articles']);
Route::get('services/{id?}', [ServiceController::class, 'allService']);
Route::get('logo', [MediaController::class, 'logo']);
Route::get('company', [CompanyController::class, 'companyInfo']);

Route::post('storeContact', [ContactController::class, 'store']);
Route::put('updateContact', [ContactController::class, 'update']);
Route::delete('deleteContact/{id}', [ContactController::class, 'delete']);
Route::get('contactList', [ContactController::class, 'contactList']);

Route::get('searchArticle/{title}', [ArticleController::class, 'search']);

// get single article
Route::post('singleArticle', [ArticleController::class, 'getSingleArticle']);

Route::get('mediaList', [MediaController::class, 'allMedia']);
Route::get('teamList', [TeamController::class, 'allTeam']);

Route::post('register', [UserController::class, 'registerUser']);
Route::post('login', [UserController::class, 'login']);