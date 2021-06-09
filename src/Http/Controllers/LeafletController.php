<?php

namespace Larswiegers\LaravelMaps\Http\Controllers;

class LeafletController
{
    public function index() {
        return view('maps::leaflet');
    }

    public function centerPoint() {
        return view('maps::leaflet-centerpoint');
    }

    public function markers() {
        return view('maps::leaflet-markers');
    }
}
