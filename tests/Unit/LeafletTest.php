<?php

declare(strict_types=1);

namespace Tests\Unit;

use Tests\TestCase;

final class LeafletTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_it_can_render_the_basic_leaflet_component()
    {
        $view = view('maps::tests.views.basic-leaflet');
        $rendered =$view->render();

        $this->assertStringContainsString('Test', $rendered);
    }
}
