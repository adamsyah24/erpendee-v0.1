<?php

use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/{record}/pdf/download', [DownloadPdfController::class, 'download'])->name('order.pdf.download');
Route::get('/{record}/pdf/download', [PDFController::class, 'generatePDF'])->name('order.pdf.download');
// Route::get('myPDF', [PDFController::class, 'previewPDF'])->name('preview.pdf');
