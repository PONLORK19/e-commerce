<?php

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;
// use \App\Http\Controllers\CategoryController;
// use Illuminate\Support\Facades\Auth;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::controller(CategoryController::class)->prefix('categories')->group(function() {
//     Route::get('/', 'getCategories');
//     Route::post('/', 'createCategory');
//     Route::get('/{categoryId}', 'getCategory');
//     Route::patch('/{categoryId}', 'updateCategory');
//     Route::delete('/{categoryId}', 'deleteCategory');
// });
// Route::post('/login', function (Request $request) {

//     $request->validate([
//         'email' => 'required|email',
//         'password' => 'required',
//     ]);

//     if (!Auth::attempt($request->only('email', 'password'))) {
//         return response()->json(['message' => 'Invalid credentials'], 401);
//     }

//     $user = $request->user();
//     $token = $user->createToken('mobile')->accessToken;

//     return response()->json([
//         'token' => $token,
//         'user' => $user->only('id', 'name', 'email'),
//         'roles' => $user->roles->pluck('name'),
//     ]);
// });

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::post('/login', function (Request $request) {

    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (!Auth::attempt($request->only('email', 'password'))) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    $user = $request->user();
    $token = $user->createToken('mobile')->accessToken;

    return response()->json([
        'token' => $token,
        'user' => $user->only('id', 'name', 'email'),
        'roles' => $user->roles->pluck('name'),
    ]);
});
