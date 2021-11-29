<?php

namespace Tests\Feature;

use Tests\TestCase;

class HelloTest extends TestCase
{
    public function test_user_can_view_homepage()
    {
        // On va sur la page d'accueil
        $response = $this->get('/');

        // On peut vérifier que la page affiche "Laravel"
        $response->assertSee('Laravel');
    }
}
