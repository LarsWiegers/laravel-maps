<?php

use Larswiegers\LaravelMaps\Http\Controllers\LeafletController;

Route::get('/maps/leaflet', [LeafletController::class, 'index'])->name('maps::maps.leaflet');
Route::get('/maps/leaflet-centerpoint', [LeafletController::class, 'centerPoint'])->name('maps::maps.leaflet-centerpoint');
Route::get('/maps/leaflet-markers', [LeafletController::class, 'markers'])->name('maps::maps.leaflet-markers');
