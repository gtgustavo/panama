<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->coin();
        $this->country();
        $this->province();
    }

    private function coin()
    {
        DB::table('coin')->insert(array(
            'name'       => 'DÓLAR ESTADOUNIDENSE',
            'iso'        => 'USD',
            'symbol'     => '$',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        DB::table('coin')->insert(array(
            'name'       => 'BALBOA',
            'iso'        => 'PAB',
            'symbol'     => 'B/. ฿',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        DB::table('coin')->insert(array(
            'name'       => 'BOLÍVAR',
            'iso'        => 'VEF',
            'symbol'     => 'Bs.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));
    }

    private function country()
    {
        DB::table('country')->insert(array(
            'name'       => 'ESTADOS UNIDOS',
            'iso'        => 'US',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        DB::table('country')->insert(array(
            'name'       => 'PANAMÁ',
            'iso'        => 'PA',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        DB::table('country')->insert(array(
            'name'       => 'VENEZUELA',
            'iso'        => 'VE',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));
    }

    private function province()
    {
        $province = ['BOCAS DEL TORO', 'CHIRIQUÍ', 'COCLÉ', 'COLÓN', 'DARIÉN', 'HERRERA', 'LOS SANTOS',
                     'PANAMÁ', 'PANAMÁ OESTE', 'VERAGUAS', 'EMBERÁ-WOUNAAN', 'NGÄBE-BUGLÉ'];

        for($i=0; $i < 12; $i++)
        {
            DB::table('province')->insert(array(
                'name'       => $province[$i],
                'country_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ));
        }

        $province = ['AMAZONAS', 'ANZOATEGUI', 'APURE', 'BARINAS', 'ARAGUA', 'CARABOBO', 'BOLIVAR',
                     'COJEDES', 'DELTA AMACURO', 'FALCON', 'DISTRITO CAPITAL', 'GUARICO', 'MERIDA',
                     'LARA', 'MIRANDA', 'MONAGAS', 'NUEVA ESPARTA', 'PORTUGUESA', 'SUCRE', 'TACHIRA',
                     'TRUJILLO', 'YARACUY', 'VARGAS', 'ZULIA'];

        for($i=0; $i < 24; $i++)
        {
            DB::table('province')->insert(array(
                'name'       => $province[$i],
                'country_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ));
        }
    }
}
