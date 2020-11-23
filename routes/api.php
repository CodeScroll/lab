<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SkillsController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\UsersSkillsController;
use App\Http\Controllers\UsersVacationsController;

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
Route::apiResource('users', UsersController::class);
Route::apiResource('skills', SkillsController::class);
Route::apiResource('departments', DepartmentsController::class);

Route::apiResource('users-skills', UsersSkillsController::class, ['only' => ['index']]);
Route::post('/users/{users}/skills', 'App\Http\Controllers\UsersSkillsController@store')->name('users.skills.store');

Route::get('/users/{user}/vacations', 'App\Http\Controllers\UsersVacationsController@index')->name('users.vacations.index');

Route::post('/users/{users}/vacations', 'App\Http\Controllers\UsersVacationsController@store')->name('users.vacations.store');
Route::put('/users/{user}/vacation/{vacation}', 'App\Http\Controllers\UsersVacationsController@update')->name('users.vacations.update');

Route::post('/department/{department}/user/{user}', 'App\Http\Controllers\DepartmentsUsersController@store')->name('department.users.store');
Route::delete('/department/{department}/user/{user}', 'App\Http\Controllers\DepartmentsUsersController@delete')->name('department.users.delete');
