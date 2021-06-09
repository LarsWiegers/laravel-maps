<?php

namespace Larswiegers\LaravelMaps\Http\Controllers;

class GoogleController
{
    public function index() {
        return view('maps::google');
    }

    public function centerPoint() {
        return view('maps::google-centerpoint');
    }

    public function markers() {
        return view('maps::google-markers');
    }
}
