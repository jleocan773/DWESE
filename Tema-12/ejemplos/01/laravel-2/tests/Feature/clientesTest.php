<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class clientesTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_edit(): void
    {
        $response = $this->get('/clientes/edit/5');

        $response->assertStatus(200);
        $response->assertSee("Se va a editar al cliente: 5" );
    }

    public function test_delete(): void
    {
        $response = $this->get('/clientes/delete/1');

        $response->assertStatus(200);
        $response->assertSee("Eliminar al cliente: 1" );
    }

    public function test_new(): void
    {
        $response = $this->get('/clientes/new');

        $response->assertStatus(200);
        $response->assertSee("New Cliente" );
    }

    public function test_show(): void
    {
        $response = $this->get('/clientes/show/6');

        $response->assertStatus(200);
        $response->assertSee("Se va a mostrar al cliente: 6");
    }
}
