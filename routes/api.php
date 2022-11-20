<?php

use App\Http\Controllers\Todo\Controller\TodoController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

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
Route::post('/login', function (Request $request) {
    if (!Auth::attempt($request->only('email', 'password'))) {
        return response()->json([
            'message' => 'Invalid login details'
        ], 401);
    }

    $user = User::where('email', $request->email)->firstOrFail();

    $token = $user->createToken('auth')->plainTextToken;

    return response()->json([
        'token' => $token,
        'prefix' => 'Bearer',
    ]);
});

Route::middleware('auth:sanctum')->controller(TodoController::class)->prefix('todo/')->name('todo.')->group(function () {
    Route::post('store', 'store')->name('store');
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
