<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class ReservasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reservas')->insert([
            'user_id'=>\App\Models\User::all()->where('name','<>','admin')->random()->id,
            'casa_id'=>\App\Models\Casas::all()->random()->id,
            'fechaEntrada'=> '2021/05/05',
            'fechaSalida'=> '2021/05/05',
            'ocupantes'=> '10'
        ]);
        DB::table('reservas')->insert([
            'user_id'=>\App\Models\User::all()->where('name','<>','admin')->random()->id,
            'casa_id'=>\App\Models\Casas::all()->random()->id,
            'fechaEntrada'=> '2021/05/05',
            'fechaSalida'=> '2021/05/05',
            'ocupantes'=> '15'
        ]);
    }
}
