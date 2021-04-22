<?php

namespace Larswiegers\LaravelMaps\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Leaflet extends Component
{

    public function __construct()
    {
    }

    public function render() : View
    {
        return view('maps::components.leaflet');
    }
}
