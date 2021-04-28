<?php

declare(strict_types=1);

namespace Tests\Unit;

use Tests\InteractsWithViews;
use Tests\TestCase;

final class LeafletTest extends TestCase
{
    use InteractsWithViews;

    public function test_it_can_render_the_basic_leaflet_component()
    {
        $content = $this->getComponentRenderedContent('<x-maps-leaflet></x-maps-leaflet>');
        $this->assertStringContainsString('<div id="mapid"></div>', $content);
    }

    public function test_it_can_render_with_a_centre_point()
    {
        $content = $this->getComponentRenderedContent("<x-maps-leaflet :centerPoint=\"['lat' => 52, 'long' => 5]\"></x-maps-leaflet>");
        $this->assertStringContainsString('setView([52, 5]', $content);
    }

    public function test_we_can_set_the_zoom_level()
    {
        $content = $this->getComponentRenderedContent("<x-maps-leaflet :zoomLevel=\"6\"></x-maps-leaflet>");
        $this->assertStringContainsString('setView([0, 0], 6);', $content);
    }
}
