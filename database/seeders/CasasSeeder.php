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
            'user_id'=>\App\Models\User::all()->id='1',
            'nombre'=> 'Mirador de Bendones',
            'dueño'=> 'admin',
            'descripcion'=>'El Mirador de Bendones se encuentra a 6 km de la plaza de la Constitución y ofrece alojamiento con salón compartido, jardín y servicio de habitaciones. La casa rural ofrece WiFi y aparcamiento privado gratuitos.
                            El baño privado está totalmente equipado con ducha y artículos de aseo gratuitos.
                            El Mirador de Bendones sirve un desayuno continental o a la carta.
                            El alojamiento tiene terraza.
                            En los alrededores se puede practicar senderismo. El Mirador de Bendones ofrece servicio de alquiler de coches.
                            La casa rural está a 6,1 km de la plaza de España y a 5,3 km del auditorio Príncipe Felipe. El aeropuerto más cercano es el de Asturias, ubicado a 50 km de El Mirador de Bendones. Se proporciona servicio de enlace con el aeropuerto por un suplemento.',
            'direccion'=>'Aldea Bendones Bendones nº 13',
            'capacidad' => "20",
            'precio' => "50",
            'imagen' => "images/casa1.jpg"
        ]);

        DB::table('casas')->insert([
            'user_id'=>\App\Models\User::all()->id='1',
            'nombre'=> 'Casa Pepín',
            'dueño'=> 'admin',
            'descripcion'=>'La Casa Pepín - Sagasta Rural Oviedo ofrece vistas a la ciudad y alojamiento con jardín y balcón a unos 8,2 km de la plaza de la Constitución. Esta casa rural ofrece aparcamiento privado gratuito y se encuentra en una zona ideal para practicar esquí, ciclismo y dardos.
                            La casa rural tiene 2 dormitorios, 2 baños, ropa de cama, toallas, TV de pantalla plana, zona de comedor, cocina totalmente equipada y patio con vistas al jardín.
                            Esta casa rural cuenta con parque infantil. La Casa Pepín - Sagasta Rural Oviedo ofrece servicio de alquiler de bicicletas.
                            La plaza de España se encuentra a 10 km del alojamiento, mientras que la iglesia de San Julián de los Prados está a 5,7 km. El aeropuerto más cercano es el de Asturias, ubicado a 47 km de la Casa Pepín - Sagasta Rural Oviedo',
            'direccion'=>'89 Aldea Roces, 33010 Oviedo',
            'capacidad' => "15",
            'precio' => "65",
            'imagen' => "images/casa2.jpg"
        ]);
        
        DB::table('casas')->insert([
            'user_id'=>\App\Models\User::all()->id='1',
            'nombre'=> 'LOFT Y CASA',
            'dueño'=> 'admin',
            'descripcion'=>'El LOFT Y CASA habitaciones en Gijon se encuentra en Gijón, a solo 5 km del acuario de Gijón, y ofrece acceso a salón compartido, jardín y cocina compartida. Esta casa rural ofrece aparcamiento privado gratuito y servicio de habitaciones.
                            Hay TV de pantalla plana.
                            La casa rural cuenta con barbacoa y solárium.
                            La estación de autobuses de Gijón y la oficina de turismo de Infogijón se encuentran a 6 km del LOFT Y CASA habitaciones en Gijon. El aeropuerto más cercano es el de Asturias, ubicado a 24 km. Se proporciona servicio de enlace con el aeropuerto por un suplemento.',
            'direccion'=>'Camino Real, 33691 Gijón, España',
            'capacidad' => "20",
            'precio' => "80",
            'imagen' => "images/casa4.jpg"
        ]);

        DB::table('casas')->insert([
            'user_id'=>\App\Models\User::all()->id='1',
            'nombre'=> 'El Verderín de Onón',
            'dueño'=> 'admin',
            'descripcion'=>'El Verderín de Onón es un alojamiento con vistas a la montaña situado en Gijón, a 49 km de la plaza de España y a 18 km del Museo del Jurásico de Asturias. Esta casa rural cuenta con jardín, zona de barbacoa, WiFi gratuita y aparcamiento privado gratuito.
                            La casa rural cuenta con 4 dormitorios, 4 baños, ropa de cama, toallas, TV de pantalla plana vía satélite, zona de comedor, cocina totalmente equipada y terraza con vistas al jardín.
                            La asociación de empresarios asturianos se encuentra a 26 km de la casa rural, mientras que el LABoral Centro de Arte y Creación Industrial está a 27 km. El aeropuerto más cercano es el de Asturias, ubicado a 69 km de El Verderín de Onón.',
            'direccion'=>'Ctra. Nacional 632, Km. 37,4, 33316, Asturias, 33136 Gijón',
            'capacidad' => "20",
            'precio' => "100",
            'imagen' => "images/casa3.jpg"
        ]);

        DB::table('casas')->insert([
            'user_id'=>\App\Models\User::all()->id='1',
            'nombre'=> 'Casa de vacaciones',
            'dueño'=> 'admin',
            'descripcion'=>'Entonces esta hermosa casa de vacaciones en Sevares / Piloña es ideal. Tiene un fantástico jardín con árboles frutales, terraza y barbacoa. En un salón amplio y luminoso de 100 m², hay 4 dormitorios y 2 baños, que ofrecen suficiente espacio para hasta 8 personas. La casa amueblada con gusto y estilo rústico está equipada con calefacción central y una estufa y por lo tanto también es adecuada para una estancia acogedora en invierno.
                            En 23 km de distancia se puede llegar a hermosas playas y la hermosa Oviedo es un destino popular.
                            Recobre la ilusión de compartir experiencias, momentos irrepetibles durante sus vacaciones. Desde hoy, puede aportar un valor añadido a sus días de descanso, a tan sólo un golpe de clic.',
            'direccion'=>'Piloña, Provincia De Asturias',
            'capacidad' => "10",
            'precio' => "50",
            'imagen' => "images/casa5.jpg"
        ]);
    }
}
