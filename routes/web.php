<?php

use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Reyno Andrean Wijaksono — Personal Developer Portfolio Routes
|
*/

Route::get('/', [PortfolioController::class, 'index'])->name('home');
Route::get('/projects/{project:slug}', [PortfolioController::class, 'show'])->name('projects.show');
Route::get('/assets/cv/reyno-andrean-wijaksono-cv.pdf', [PortfolioController::class, 'downloadCv'])->name('cv.download');
Route::get('/cv/download', [PortfolioController::class, 'downloadCv']);
