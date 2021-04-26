<?php

namespace Larswiegers\LaravelMaps\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Leaflet extends Component
{

    public int $zoomLevel;

    public int $maxZoomLevel;

    public array $centerPoint;

    public array $markers;

    public function __construct($centerPoint = [0,0], $markers = [], $zoomLevel = 13, $maxZoomLevel = 18)
    {
        $this->centerPoint = $centerPoint;
        $this->zoomLevel = $zoomLevel;
        $this->maxZoomLevel = $maxZoomLevel;
        $this->markers = $markers;
    }

    public function render() : View
    {
        $markerArray = [];

        foreach($this->markers as $marker) {
            $markerArray[] = [implode(",", $marker)];
        }

        return view('maps::components.leaflet', [
            'centerPoint' => $this->centerPoint,
            'zoomLevel' => $this->zoomLevel,
            'maxZoomLevel' => $this->maxZoomLevel,
            'markers' => $this->markers,
            'markerArray' => $markerArray
        ]);
    }
}
