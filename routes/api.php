<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\API\VaksinController;

Route::get('/pasiens', [ApiController::class, 'search']);
Route::get('/vaksin-isi/{id}', [VaksinController::class, 'getVaksinIsi']);

