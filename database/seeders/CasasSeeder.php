<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
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
            'dueño'=> 'Piso',
            'descripcion'=>'Descripcion',
            'direccion'=>'La manjoya 22,3A',
            'precio' => "20",
            'imagen' => "../public/images/empresa.jpg"
        ]);
    }
}
