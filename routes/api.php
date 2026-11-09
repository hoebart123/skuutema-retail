<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\VoorraadController;
use App\Http\Controllers\Api\BestellingController;
Route::get('/status', fn () => response()->json(['service' => 'Skuutema Retail', 'status' => 'ok']));
// Demo-read endpoints. Beveilig en autoriseer deze vóór productiegebruik.
Route::get('/voorraad/barcode/{barcode}', [VoorraadController::class, 'zoekOpBarcode']);
// Concept endpoint: niet actief totdat authenticatie en autorisatie zijn geïmplementeerd.
// Route::post('/bestellingen', [BestellingController::class, 'store'])->middleware('auth:sanctum');
