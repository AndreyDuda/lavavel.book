<?php

use App\Http\Controllers;
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


/*Route::get('/', function () {
    return 'Hello, world';
});*/

Route::get('/', [Controllers\WelcomeController::class, 'index']);

Route::resource('tasks', 'MySimpleResourceController');

Route::apiResorce('api_task', 'ApiMySimpleResourceController');
