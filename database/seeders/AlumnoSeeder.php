<?php

namespace Database\Seeders;

use App\Models\Alumno;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Alumno::make([
            'nombre' => 'Pepe',
            'correo' => 'pepe@gmail.com',
            'FNacimiento' => '20/10/2001',
            'Ciudad' => 'CDMX',
        ]);
        
    }
}
