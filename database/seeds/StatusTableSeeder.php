<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert(array(
            'name'        => 'PRECHEQUEADO',
            'description' => 'Paquetes configurados por clientes vía web',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ));

        DB::table('status')->insert(array(
            'name'        => 'ENTREGADO EN CENTRO',
            'description' => 'Paquetes que están en el centro de recepción listos para realizar su embarcación',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ));

        DB::table('status')->insert(array(
            'name'        => 'RECIBIDO EN CENTRO DE EMBARQUE',
            'description' => 'Paquetes que están en el centro de embarcación por espera a salir',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ));

        DB::table('status')->insert(array(
            'name'        => 'EMBARCADO',
            'description' => 'Paquetes embarcados al país destino',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ));

        DB::table('status')->insert(array(
            'name'        => 'RECIBIDO EN PAÍS DESTINO (PENDIENTE POR ENTREGA)',
            'description' => 'Paquetes recibidos en el centro de recepción del país destino',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ));

        DB::table('status')->insert(array(
            'name'        => 'ENTREGADO',
            'description' => 'Paquete recibido satisfactoriamente en destino',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ));
    }
}
