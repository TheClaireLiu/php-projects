<?php

use App\Http\Controllers\QuoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::get('/quotes', [QuoteController::class, 'index']);
Route::apiResource('quotes', QuoteController::class);
