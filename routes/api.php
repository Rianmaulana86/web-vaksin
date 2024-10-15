<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\API\VaksinController;
use App\Http\Controllers\API\TravelController;

Route::get('/pasiens', [ApiController::class, 'search']);
Route::get('/vaksin-isi/{id}', [VaksinController::class, 'getVaksinIsi']);
Route::get('/getTravel/{id}', [TravelController::class, 'getTravel']);

