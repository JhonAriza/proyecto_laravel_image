<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Support\Facades\DB; // Importa la clase DB
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'nombre' => 'alex el mejor'
        ]);

        $faker = \Faker\Factory::create('es_ES');

        for ($i = 0; $i < 100; $i++) {
            DB::table('categorias')->insert([
                'nombre' => $faker->word,

            ]);
        }
    }
}
