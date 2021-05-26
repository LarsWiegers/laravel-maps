<?php

declare(strict_types=1);

namespace Tests\Unit;

use Tests\InteractsWithViews;
use Tests\TestCase;

final class GoogleMapsTest extends TestCase
{
    use InteractsWithViews;

    public function test_it_can_render_the_basic_maps_component()
    {
        $content = $this->getComponentRenderedContent('<x-maps-google id="map" />');
        $this->assertStringContainsString('<div id="map"></div>', $content);
    }

    public function test_it_can_render_with_a_centre_point()
    {
        $content = $this->getComponentRenderedContent("<x-maps-google :centerPoint=\"['lat' => 52, 'long' => 5]\"></x-maps-google>");
        $this->assertStringContainsString('center: { lat: 52, lng: 5 },', $content);
    }

    public function test_we_can_set_the_zoom_level()
    {
        $content = $this->getComponentRenderedContent("<x-maps-google :zoomLevel=\"6\"></x-maps-google>");

        $this->assertStringContainsString('zoom: 6', $content);
    }
}
