<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DocumentationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\spreadsheetController;
use App\Models\Admin;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

/*
|--------------------------------------------------------------------------
| API Unprotected Routes
|--------------------------------------------------------------------------
*/
//Auth unprotected routes
Route::prefix('/auth')->group(function() {
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class, 'logout']);   
});

//Admin unprotected routes
Route::prefix('/admins')->group(function() {
    Route::post('/register', [AdminController::class, 'register']);
});

//FAQ unprotected routes
Route::prefix('/faqs')->group(function() {
    Route::get('/read', [FaqController::class, 'read']);
});

//Sponsor unprotected routes
Route::prefix('/sponsors')->group(function() {
    Route::get('/read', [SponsorController::class, 'read']);
});

//Partner unprotected routes
Route::prefix('/partners')->group(function() {
    Route::get('/read', [PartnerController::class, 'read']);
});

//Event unprotected routes
Route::prefix('/events')->group(function() {
    Route::get('/read', [EventController::class, 'read']);
    Route::get('/read/{id}', [EventController::class, 'readDetail']);
});

//Speaker unprotected routes
Route::prefix('/speakers')->group(function() {
    Route::get('/read', [SpeakerController::class, 'read']);
    Route::get('/read/{id}', [SpeakerController::class, 'readDetail']);
});

//Article unprotected routes
Route::prefix('/articles')->group(function() {
    Route::get('/read', [ArticleController::class, 'read']);
    Route::get('/read/{id}', [ArticleController::class, 'readDetail']);
});

/*
|--------------------------------------------------------------------------
| API Protected Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth:api')->group(function () {
    //Admins API routes
    Route::prefix('/admins')->group(function() {
        Route::get('/read', [AdminController::class, 'retrieve']);
        Route::get('/readAll', [AdminController::class, 'retrieveAll']);
        Route::put('/update', [AdminController::class, 'update']);
        Route::put('/change_password', [AdminController::class, 'changePassword']);
        Route::put('/change_status/{id}', [AdminController::class, 'changeStatus']);
    });
    
    //FAQ API routes
    Route::prefix('/faqs')->group(function() {
        Route::post('/insert', [FaqController::class, 'insert']);
        Route::put('/update/{id}', [FaqController::class, 'update']);
        Route::delete('/delete/{id}', [FaqController::class, 'delete']);
    });

    //Sponsor API routes
    Route::prefix('/sponsors')->group(function() {
        Route::post('/insert', [SponsorController::class, 'insert']);
        Route::put('/update/{id}', [SponsorController::class, 'update']);
        Route::put('/image/{id}', [SponsorController::class, 'updateImage']);
        Route::delete('/delete/{id}', [SponsorController::class, 'delete']);
    });

    //Partner API routes
    Route::prefix('/partners')->group(function() {
        Route::post('/insert', [PartnerController::class, 'insert']);
        Route::put('/update/{id}', [PartnerController::class, 'update']);
        Route::put('/image/{id}', [PartnerController::class, 'updateImage']);
        Route::delete('/delete/{id}', [PartnerController::class, 'delete']);
    });

    //Event API routes
    Route::prefix('/events')->group(function() {
        Route::post('/insert', [EventController::class, 'insert']);
        Route::put('/update/{id}', [EventController::class, 'update']);
        Route::put('/image/{id}', [EventController::class, 'updateImage']);
        Route::delete('/delete/{id}', [EventController::class, 'delete']);
    });

    //Speaker API routes
    Route::prefix('/speakers')->group(function() {
        Route::post('/insert', [SpeakerController::class, 'insert']);
        Route::put('/update/{id}', [SpeakerController::class, 'update']);
        Route::put('/image/{id}', [SpeakerController::class, 'updateImage']);
        Route::delete('/delete/{id}', [SpeakerController::class, 'delete']);
    });

    //Artilce API routes
    Route::prefix('/articles')->group(function() {
        Route::post('/insert', [ArticleController::class, 'insert']);
        Route::put('/update/{id}', [ArticleController::class, 'update']);
        Route::put('/file/{id}', [ArticleController::class, 'updateFile']);
        Route::delete('/delete/{id}', [ArticleController::class, 'delete']);
    });

    //Reports API routes
    Route::prefix('/reports')->group(function() {
        Route::get('/read', [ReportController::class, 'read']);
        Route::get('/read/{id}', [ReportController::class, 'readDetail']);
        Route::post('/insert', [ReportController::class, 'insert']);
        Route::delete('/delete/{id}', [ReportController::class, 'delete']);
        Route::put('/update/{id}', [ReportController::class, 'update']);
        Route::get('/generate/{id}', [ReportController::class, 'generate']);
    });

    //Documentation API routes
    Route::prefix('/document')->group(function() {
        Route::post('/upload', [DocumentationController::class, 'upload']);
    });
});
