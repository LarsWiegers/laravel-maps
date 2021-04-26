<?php

declare(strict_types=1);

namespace Tests\Unit;

use Tests\TestCase;

final class LeafletTest extends TestCase
{
    public function test_it_can_render_the_basic_leaflet_component()
    {
        $view = view('maps::tests.views.basic-leaflet');
        $rendered =$view->render();

        $this->assertStringContainsString('<div id="mapid"></div>', $rendered);
    }

    public function test_it_can_render_with_a_centre_point()
    {
        $view = view('maps::tests.views.with-a-centerpoint-set-leaflet');
        $rendered =$view->render();

        $this->assertStringContainsString('setView([52,5]', $rendered);
    }

    public function test_we_can_set_the_zoom_level()
    {
        $view = view('maps::tests.views.with-zoom-set-leaflet');
        $rendered =$view->render();

        $this->assertStringContainsString('setView([0,0], 6);', $rendered);
    }
}
