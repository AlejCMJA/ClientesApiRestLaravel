<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class clienteseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run()
    // {
    //     $faker = Faker::create('es_ES');
    //     $cedula = $faker->bothify('###-######-###??');

    //     // Código para generar los registros con Faker
    //     for ($i = 0; $i < 10; $i++) {
    //         \DB::table('clientes')->insert([

    //             'nombre' => $faker->name,
    //             'email' => $faker->unique()->safeEmail,
    //             'telephone' => $faker->phoneNumber,
    //             'direction' => $faker->address,
    //             'cedula' => $cedula,
    //             'edad' => $faker->numberBetween(18, 60),
    //         ]);
    //     }
    // }

    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            $letras = $faker->randomElements(['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'], 2);
            $numeros1 = $faker->randomNumber(3);
            $numeros2 = $faker->randomNumber(6);
            $numeros3 = $faker->randomNumber(3);

            $cedula = $numeros1 . '-' . $numeros2 . '-' . $numeros3 . implode('', $letras);

            DB::table('clientes')->insert([
                'nombre' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'telephone' => $faker->phoneNumber,
                'direction' => $faker->address,
                'cedula' => $cedula,
                'edad' => $faker->numberBetween(18, 60),
            ]);
        }
    }
}
