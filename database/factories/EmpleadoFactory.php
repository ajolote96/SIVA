<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Empleado;
use Illuminate\Support\Str;


class EmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Empleado::class;
    public function definition()
    {
        return [
            //
            /*
            'Nombre' => $this->faker->firstName(),
            'ApellidoPaterno' => $this->faker->lastName(),
            'ApellidoMaterno' => $this->faker->firstName(),
            'RPE'=> $this->faker->postcode(),
            'IMMS' => $this->faker->postcode(),
            'FechaIngreso'=> $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'RFC'=> $this->faker->postcode(),
            'TipoSangre' => $this->faker->randomLetter(),
            'Alergias'  => $this->faker->randomLetter(),
            'Padecimientos'  => $this->faker->randomLetter(),
            'Rol'=> $this->faker->randomLetter(),
            'Domicilio' => $this->faker->streetAddress(),
            'TelefonoCasa'=> $this->faker->numberBetween($min = 1000000000, $max = 9000000000), 
            'TelefonoCelular'=> $this->faker->numberBetween($min = 1000000000, $max = 9000000000),
            'FechaNacimiento'=> $this->faker->date($format = 'Y-m-d', $max = 'now')(),
            'CorreoElectronico'=> $this->faker->email(),
            'Sexo'=> $this->faker->titleMale(),
            'EstadoCivil'=> $this->faker->citySuffix(),
            'Hijos' => $this->faker->firstName(),
            'Papa'=> $this->faker->firstName(),
            'Mama'=> $this->faker->firstName(),
            'ContactoEmergencia' => $this->faker->numberBetween($min = 1000000000, $max = 9000000000),
            'TelefonoEmergencia'=> $this->faker->numberBetween($min = 1000000000, $max = 9000000000),
            'CursosParticipaba' => $this->faker->randomLetter(),
            */
        ];
    }
}
