<?php

use App\Http\Controllers\OreouserController;

Route::post('/oreousers', [OreouserController::class, 'store']);
Route::get('/oreousers', [OreouserController::class, 'index']);   // Read all
Route::get('/oreousers/{id}', [OreouserController::class, 'show']); // Read single
Route::put('/oreousers/{id}', [OreouserController::class, 'update']); // Update
Route::delete('/oreousers/{id}', [OreouserController::class, 'destroy']); // Delete

?>
