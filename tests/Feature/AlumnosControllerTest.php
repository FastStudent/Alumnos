<?php

namespace Tests\Feature;

use App\Models\Alumno;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Routing\Route;
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

        $alumno = Alumno::factory()->make();

        $response = $this->post('/alumnos', $alumno->toArray());
        //$response = $this->post('/alumnos',[ 'nombre' =>'Luis',
        //                                     'correo' => 'correotest@gmail.com',
        //                                     'FNacimiento' => '10/02/2003',
        //                                     'Ciudad' => 'Chihuahua']);

        
        
         $response->assertStatus(302);
        // $response->assertRedirect('alumnos/create');

        $response = $this->assertDatabaseHas('alumn',$alumno->toArray()
);
    
    }



    /** @test */
    public function muestra_formulario_editar_alumno(): void
    {
        $alumno = Alumno::factory()->create();


        $response= $this->get(Route('alumnos.edit', $alumno->id));

        $response   ->assertSee('Editar Alumno')
                    ->assertSeeHtml($alumno->nombre)
                    ->assertSeeHtml($alumno->correo)
                    ->assertSeeHtml($alumno->Ciudad)
                    ->assertStatus(200);
        
    }

    /** @test */
    public function ver_alumno(): void
    {
        $alumno = Alumno::factory()->create();


        $response= $this->get(Route('alumnos.show', $alumno->id));

        $response   ->assertSee('Alumno #')
                    ->assertSeeHtml($alumno->nombre)
                    ->assertSeeHtml($alumno->correo)
                    ->assertSeeHtml($alumno->Ciudad)
                    ->assertStatus(200);

        
    }

    /** @test */
    public function elimina_alumno_correctamente(): void
    {
        
        $alumno = Alumno::factory()->create();

        
        $response = $this->delete(Route('alumnos.destroy', $alumno->id));
        $response->assertStatus(302);

        
        $this->assertDatabaseMissing('alumn', ['id' => $alumno->id]);
    }
}
