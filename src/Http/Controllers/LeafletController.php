<?php

namespace Larswiegers\LaravelMaps\Http\Controllers;

class LeafletController
{
    public function index() {
        return view('maps::leaflet');
    }
}
