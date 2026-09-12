<?php

use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Artisan;
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
        Artisan::call('migrate', ['--force' => true]);
        $migrate = Artisan::output();

        Artisan::call('db:seed', ['--force' => true]);
        $seed = Artisan::output();

        return response()->json([
            'status' => 'success',
            'message' => 'Database successfully migrated and seeded!',
            'migrate_output' => $migrate,
            'seed_output' => $seed,
        ]);
    } catch (\Throwable $e) {
        return response()->json([
            'status' => 'error',
            'error' => $e->getMessage(),
            'db_host' => config('database.connections.mysql.host'),
            'db_port' => config('database.connections.mysql.port'),
            'db_database' => config('database.connections.mysql.database'),
            'db_username' => config('database.connections.mysql.username'),
            'db_password_len' => strlen(config('database.connections.mysql.password') ?? ''),
            'db_password_preview' => substr(config('database.connections.mysql.password') ?? '', 0, 3) . '...',
        ], 500);
    }
});
