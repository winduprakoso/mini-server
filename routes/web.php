<?php

use App\Http\Controllers\OutprodController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['web', 'auth']], function () {
    Route::resource('outprod', OutprodController::class);
    Route::get('outprod-api', [OutprodController::class, 'indexApi'])->name('outprod.listapi');
    Route::get('outprod-export-pdf-default', [OutprodController::class, 'exportPdf'])->name('outprod.export-pdf-default');
    Route::get('outprod-export-excel-default', [OutprodController::class, 'exportExcel'])->name('outprod.export-excel-default');
    Route::post('outprod-import-excel-default', [OutprodController::class, 'importExcel'])->name('outprod.import-excel-default');
});
