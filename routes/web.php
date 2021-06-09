<?php

use Larswiegers\LaravelMaps\Http\Controllers\LeafletController;

Route::get('/maps/leaflet', [LeafletController::class, 'index'])->name('maps::maps.leaflet');
