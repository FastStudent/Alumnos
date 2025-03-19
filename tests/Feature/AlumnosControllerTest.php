<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AlumnosControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_muestra_listado_alumnos(): void
    {
        //$response = $this->get('/');

        $response = $this->get("/alumnos");
        $response->assertSee ('Lista de Alumnos');

        $response->assertStatus(200);
    }

    /** @test */
    public function muestra_formulario_crear_alumno(): void
    {
        $response = $this->get('/alumnos/create');
        $response->assertSee('Agregar Alumnos');
                 //->assertSee('name=Nombre');
         $response->assertStatus(200);

    }

    /** @test */
    public function crear_alumno(): void
    {
        $response = $this->post('/alumnos',[ 'nombre' =>'Luis',
                                             'correo' => 'correotest@gmail.com',
                                             'FNacimiento' => '10/02/2003',
                                             'Ciudad' => 'Chihuahua']
    
        );

        
        
         $response->assertStatus(302);
        // $response->assertRedirect('alumnos/create');

        $response = $this->assertDatabaseHas('alumn',[ 'nombre' =>'Luis',
        'correo' => 'correotest@gmail.com',
        'FNacimiento' => '10/02/2003',
        'Ciudad' => 'Chihuahua']
);
    
    }

    /** @test */
    public function ver_alumno(): void
    {




        
    }

    /** @test */
    public function eliminar_alumno(): void
    {
        $response = $this->post('alumnos.destroy',[ 'nombre' =>'Luis',
                                             'correo' => 'correotest@gmail.com',
                                             'FNacimiento' => '10/02/2003',
                                             'Ciudad' => 'Chihuahua']
    
        );

        //$response->assertStatus(404);
    
    }
}
