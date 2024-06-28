<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\PostsController;


Route::post('/subscribe', [SubscriptionController::class, 'subscribe']);
Route::post('/add-post', [PostsController::class, 'create']);