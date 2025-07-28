<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitController;

Route::get('/', function () {
    return view('layouts');
});

    /**
     * Display a listing of the resource.
     */
  Route::resource('units', UnitController::class);
