<?php

use App\Http\Controllers\PortfolioController;
use App\Models\Experience;
use App\Models\Project;
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

Route::get('/migrate-db-init', function () {
    try {
        return response()->json([
            'status' => 'success',
            'message' => 'Database SQLite is active and loaded!',
            'projects_count' => Project::count(),
            'experiences_count' => Experience::count(),
            'projects' => Project::pluck('title'),
        ]);
    } catch (Throwable $e) {
        return response()->json([
            'status' => 'error',
            'error' => $e->getMessage(),
        ], 500);
    }
});
