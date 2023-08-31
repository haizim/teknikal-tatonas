<?php

use App\Http\Controllers\HardwareController;
use App\Http\Controllers\HardwareDetailController;
use App\Http\Controllers\Home;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MasterSensorController;

Route::redirect('/', 'auth/login');

Route::middleware(['auth', 'verified'])
    ->group(
        function () {
            Route::get('/home', Home::class)->name('home');
            Route::resource('/sensor', MasterSensorController::class);
            Route::resource('/hardware', HardwareController::class);
            Route::resource('/hardware-detail', HardwareDetailController::class);
            Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
            Route::get('/laporan/pdf', [LaporanController::class, 'exportPdf'])->name('laporan-pdf');
            Route::get('/laporan/excel', [LaporanController::class, 'exportExcel'])->name('laporan-excel');
        }
    );

include __DIR__.'/auth.php';
include __DIR__.'/my.php';
