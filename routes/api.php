<?php

use App\Http\Controllers\TempOutprodController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['api'], 'prefix' => 'v1'], function () {
    Route::get('get-scan-np', [TempOutprodController::class, 'getScanNpApi']);
    Route::post('submit-scan-np', [TempOutprodController::class, 'submitScanNpApi']);
});