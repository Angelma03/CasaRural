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
            'descripcion'=>'Lorem ipsum dolor sit amet consectetur adipiscing elit phasellus, ligula duis sollicitudin natoque cubilia congue posuere suscipit, ridiculus fringilla habitasse gravida sem quis taciti. Tortor et semper pulvinar justo senectus pharetra dui habitasse nisl, ridiculus dictum malesuada auctor massa sem felis sagittis suspendisse, mattis velit pellentesque aliquet facilisis eros non viverra. Magna hendrerit arcu tincidunt cras consequat aenean duis ullamcorper, quam conubia natoque lacinia in vitae malesuada venenatis laoreet, metus erat class viverra porta fames curae.
            Ligula et fusce velit proin aliquet hendrerit purus pulvinar mi, curae consequat rhoncus aptent cras vel at tempor non conubia, aliquam ad dapibus ornare mollis sapien faucibus ullamcorper. Vestibulum massa pharetra feugiat velit tellus ullamcorper metus facilisi, odio nascetur vivamus vitae iaculis platea mauris viverra eu, interdum nibh penatibus sodales senectus habitasse parturient. Posuere curae tortor hac viverra nullam mi aliquam quam habitant odio, tempor cubilia magna ultricies luctus vivamus fermentum facilisis vestibulum.',
            'direccion'=>'La manjoya 22,3A',
            'precio' => "20",
            'imagen' => "images/empresa.jpg"
        ]);
        DB::table('casas')->insert([
            'user_id'=>\App\Models\User::all()->where('name','<>','admin')->random()->id,
            'nombre'=> 'Urbanizacion de Lujo',
            'dueño'=> 'Piso',
            'descripcion'=>'Lorem ipsum dolor sit amet consectetur adipiscing elit phasellus, ligula duis sollicitudin natoque cubilia congue posuere suscipit, ridiculus fringilla habitasse gravida sem quis taciti. Tortor et semper pulvinar justo senectus pharetra dui habitasse nisl, ridiculus dictum malesuada auctor massa sem felis sagittis suspendisse, mattis velit pellentesque aliquet facilisis eros non viverra. Magna hendrerit arcu tincidunt cras consequat aenean duis ullamcorper, quam conubia natoque lacinia in vitae malesuada venenatis laoreet, metus erat class viverra porta fames curae.
            Ligula et fusce velit proin aliquet hendrerit purus pulvinar mi, curae consequat rhoncus aptent cras vel at tempor non conubia, aliquam ad dapibus ornare mollis sapien faucibus ullamcorper. Vestibulum massa pharetra feugiat velit tellus ullamcorper metus facilisi, odio nascetur vivamus vitae iaculis platea mauris viverra eu, interdum nibh penatibus sodales senectus habitasse parturient. Posuere curae tortor hac viverra nullam mi aliquam quam habitant odio, tempor cubilia magna ultricies luctus vivamus fermentum facilisis vestibulum.',
            'direccion'=>'La manjoya 22,3A',
            'precio' => "20",
            'imagen' => "images/empresa.jpg"
        ]);
    }
}
