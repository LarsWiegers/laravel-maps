<?php

declare(strict_types=1);

namespace Tests\Unit;

use Tests\TestCase;

final class GoogleMapsTest extends TestCase
{
    public function test_it_can_render_the_basic_maps_component()
    {
        $view = view('maps::tests.views.google.basic');
        $rendered =$view->render();

        $this->assertStringContainsString('<div id="map"></div>', $rendered);
    }

    public function test_it_can_render_with_a_centre_point()
    {
        $view = view('maps::tests.views.google.with-a-centerpoint-set');
        $rendered =$view->render();

        $this->assertStringContainsString('center: { lat: 52, lng: 5 },', $rendered);
    }

    public function test_we_can_set_the_zoom_level()
    {
        $view = view('maps::tests.views.google.with-zoom-set');
        $rendered =$view->render();

        $this->assertStringContainsString('zoom: 6', $rendered);
    }
}
