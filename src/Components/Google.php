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

    public array $centerPoint;

    public array $markers;

    public $tileHost;

    public $mapId;

    public function __construct($centerPoint = [0, 0], $markers = [], $zoomLevel = 13, $maxZoomLevel = 18, $fitToBounds = false, $centerToBoundsCenter = false, $tileHost = 'openstreetmap', $id = self::DEFAULTMAPID)
    {
        $this->centerPoint = $centerPoint;
        $this->zoomLevel = $zoomLevel;
        $this->maxZoomLevel = $maxZoomLevel;
        $this->fitToBounds = $fitToBounds;
        $this->centerToBoundsCenter = $centerToBoundsCenter;
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


        return view('maps::components.google', [
            'centerPoint' => $this->centerPoint,
            'zoomLevel' => $this->zoomLevel,
            'maxZoomLevel' => $this->maxZoomLevel,
            'fitToBounds' => $this->fitToBounds,
            'centerToBoundsCenter' => $this->centerToBoundsCenter,
            'markers' => $this->markers,
            'markerArray' => $markerArray,
            'tileHost' => $this->tileHost,
            'mapId' => $this->mapId,
            'mapHasBeenLoadedBefore' => $shouldIncludeMapJS,
        ]);
    }
}
