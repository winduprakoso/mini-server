<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OutprodController;
use App\Http\Controllers\SampleSocketController;
use App\Http\Controllers\TempOutprodController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('outprod', OutprodController::class);
    Route::get('outprod-api', [OutprodController::class, 'indexApi'])->name('outprod.listapi');
    Route::get('outprod-export-pdf-default', [OutprodController::class, 'exportPdf'])->name('outprod.export-pdf-default');
    Route::get('outprod-export-excel-default', [OutprodController::class, 'exportExcel'])->name('outprod.export-excel-default');
    Route::post('outprod-import-excel-default', [OutprodController::class, 'importExcel'])->name('outprod.import-excel-default');

    Route::resource('temp-outprod', TempOutprodController::class);
    Route::get('temp-outprod-api', [TempOutprodController::class, 'indexApi'])->name('temp-outprod.listapi');
    Route::get('temp-outprod-export-pdf-default', [TempOutprodController::class, 'exportPdf'])->name('temp-outprod.export-pdf-default');
    Route::get('temp-outprod-export-excel-default', [TempOutprodController::class, 'exportExcel'])->name('temp-outprod.export-excel-default');
    Route::post('temp-outprod-import-excel-default', [TempOutprodController::class, 'importExcel'])->name('temp-outprod.import-excel-default');
    
    Route::get('temp-outprod-scan-nameplate', [TempOutprodController::class, 'viewScanNp']);
    
});


    Route::get('sampel-socket', [SampleSocketController::class, 'index']);
    Route::post('sampel-socket-submit', [SampleSocketController::class, 'submit']);
    