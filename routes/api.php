<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\{AuthController,CategoryController};



Route::post('register-user',[AuthController::Class,'registerUser']);
Route::post('login',[AuthController::class,'login']);




Route::prefix('admin')->middleware('auth:sanctum')->group(function(){


    // category 
    Route::post('add-category',[CategoryController::class,'addCategory']);
    Route::post('update-category/{id}',[CategoryController::class,'updateCategory']);
    Route::delete('delete-category',[CategoryController::class,'deleteCategory']);
 

 }) ;    