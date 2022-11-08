<?php

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use SultanovPackage\MyCase\Controllers\AppLoader;

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

Route::group(['prefix' => '/ct/assets/'], function(){

    Route::get('css/app', function (){
        return response()->file(ASSETS_PATH . '/css/app.css', [
            'Content-Type' => 'text/css'
        ]);
    });

    Route::get('js/app', function (){
        return response(File::get(ASSETS_PATH . '/js/app.js'), 200, [
            'Content-Type' => 'text/javascript'
        ]);
    });
});


Route::get('{any?}', [AppLoader::class, 'index']);
