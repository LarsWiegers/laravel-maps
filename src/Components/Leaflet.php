<?php

namespace Larswiegers\LaravelMaps\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\View\View;

class Leaflet extends Component
{

    const DEFAULTMAPID = "defaultMapId";

    public int $zoomLevel;

    public int $maxZoomLevel;

    public array $centerPoint;

    public array $markers;

    public $tileHost;

    public $mapId;

    public function __construct($centerPoint = [0,0], $markers = [], $zoomLevel = 13, $maxZoomLevel = 18, $tileHost = 'openstreetmap', $id = self::DEFAULTMAPID )
    {
        $this->centerPoint = $centerPoint;
        $this->zoomLevel = $zoomLevel;
        $this->maxZoomLevel = $maxZoomLevel;
        $this->markers = $markers;
        $this->tileHost = $tileHost;
        $this->mapId = $id;
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
            'markerArray' => $markerArray,
            'tileHost' => $this->tileHost,
            'mapId' => $this->mapId === self::DEFAULTMAPID ? Str::random() : $this->mapId
        ]);
    }
}
