<?php

declare(strict_types=1);

namespace Tests\Unit;

use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
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

    public function test_it_has_default_styles()
    {
        $content = $this->getComponentRenderedContent("<x-maps-google></x-maps-google>");
        $this->assertStringContainsString('height: 100vh', $content);
    }

    public function test_it_has_can_take_styles_as_attribute()
    {
        $content = $this->getComponentRenderedContent("<x-maps-google style='height: 50vh'></x-maps-google>");
        $this->assertStringContainsString('height: 50vh', $content);
    }

    public function test_it_can_take_classes_as_attribute()
    {
        $content = $this->getComponentRenderedContent("<x-maps-google class='h-16'></x-maps-google>");
        $this->assertStringContainsString("class='h-16'", $content);
    }

    public function test_it_can_take_custom_icon_on_marker()
    {
        $content = $this->getComponentRenderedContent("<x-maps-google :markers=\"[['lat' => 38.716450, 'long' => 0.055684, 'icon' => 'icon.png']]\"></x-maps-google>");
        $this->assertStringContainsString('icon: "icon.png"', $content);
    }

    public function test_it_can_take_custom_infowindow_on_marker()
    {
        $content = $this->getComponentRenderedContent("<x-maps-google :markers=\"[['lat' => 38.716450, 'long' => 0.055684, 'info' => 'MarkerInfo']]\"></x-maps-google>");
        $this->assertStringContainsString('addInfoWindow(marker1, "MarkerInfo");', $content);
    }

    public function test_we_can_set_fit_to_bounds()
    {
        $content = $this->getComponentRenderedContent("<x-maps-google :markers=\"[['lat' => 38.716450, 'long' => 0.055684]]\" :fitToBounds=\"true\"></x-maps-google>");
        $this->assertStringContainsString('let bounds = new google.maps.LatLngBounds();', $content);
        $this->assertStringContainsString('.fitBounds(bounds)', $content);
    }

    public function test_we_can_set_center_to_bounds_center()
    {
        $content = $this->getComponentRenderedContent("<x-maps-google :markers=\"[['lat' => 38.716450, 'long' => 0.055684]]\" :centerToBoundsCenter=\"true\"></x-maps-google>");
        $this->assertStringContainsString('let bounds = new google.maps.LatLngBounds();', $content);
        $this->assertStringContainsString('.setCenter(bounds.getCenter())', $content);
    }

    public function test_we_can_set_map_type()
    {
        $content = $this->getComponentRenderedContent("<x-maps-google :mapType=\"'hybrid'\"></x-maps-google>");
        $this->assertStringContainsString("mapTypeId: 'hybrid'", $content);
    }

    public function test_that_invalid_map_type_fallbacks_to_default_map_type()
    {
        $content = $this->getComponentRenderedContent("<x-maps-google :mapType=\"'invalidtype'\"></x-maps-google>");
        $this->assertStringContainsString("mapTypeId: 'roadmap'", $content);
    }
}
