<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CasasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('casas')->insert([
            'user_id'=>\App\Models\User::all()->where('name','<>','admin')->random()->id,
            'nombre'=> 'Urbanizacion de Lujo',
            'tipo'=> 'Piso',
            'direccion'=>'La manjoya 22,3A',
            'precio'=>'150000',
            'imagen' => "images/imagen1.jpg",
        ]);

        DB::table('casas')->insert([
            'user_id'=>\App\Models\User::all()->where('name','<>','admin')->random()->id,
            'nombre'=> 'Chalet',
            'tipo'=> 'Casa',
            'direccion'=>'Avenida Luis 201,Oviedo',
            'precio'=>'300000',
            'imagen'=> 'images/imagen2.jpg',
        ]);
    }
}
