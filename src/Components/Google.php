<?php

namespace Larswiegers\LaravelMaps\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\View\View;

class Google extends Component
{
    const DEFAULTMAPID = "defaultMapId";

    public static $mapHasBeenLoadedBefore = false;

    public int $zoomLevel;

    public int $maxZoomLevel;

    public bool $fitToBounds;

    public bool $centerToBoundsCenter;

    public string $mapType;

    public array $centerPoint;

    public array $markers;

    public $tileHost;

    public $mapId;

    public function __construct($centerPoint = [0, 0], $markers = [], $zoomLevel = 13, $maxZoomLevel = 18, $fitToBounds = false, $centerToBoundsCenter = false, $mapType = 'roadmap', $tileHost = 'openstreetmap', $id = self::DEFAULTMAPID)
    {
        $this->centerPoint = $centerPoint;
        $this->zoomLevel = $zoomLevel;
        $this->maxZoomLevel = $maxZoomLevel;
        $this->fitToBounds = $fitToBounds;
        $this->centerToBoundsCenter = $centerToBoundsCenter;
        $this->mapType = strtolower($mapType);
        $this->markers = $markers;
        $this->tileHost = $tileHost;
        $this->mapId = $this->mapId = $id === self::DEFAULTMAPID ? Str::random() : $id;
    }

    public function render(): View
    {
        $markerArray = [];

        foreach($this->markers as $marker) {
            $markerArray[] = [implode(",", $marker)];
        }

        $shouldIncludeMapJS = !self::$mapHasBeenLoadedBefore;
        self::$mapHasBeenLoadedBefore = true;


        if (!empty($this->mapType) && !in_array($this->mapType, ['roadmap', 'satellite', 'hybrid', 'terrain'], true)) {
            $this->mapType = 'roadmap';
        }

        return view('maps::components.google', [
            'centerPoint' => $this->centerPoint,
            'zoomLevel' => $this->zoomLevel,
            'maxZoomLevel' => $this->maxZoomLevel,
            'fitToBounds' => $this->fitToBounds,
            'centerToBoundsCenter' => $this->centerToBoundsCenter,
            'mapType' => $this->mapType,
            'markers' => $this->markers,
            'markerArray' => $markerArray,
            'tileHost' => $this->tileHost,
            'mapId' => $this->mapId,
            'mapHasBeenLoadedBefore' => $shouldIncludeMapJS,
        ]);
    }
}
