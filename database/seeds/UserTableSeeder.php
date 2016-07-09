<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reception')->insert(array(
            'name'        => 'ONLINE',
            'province_id' => 23,
            'city'        => 'CARACAS',
            'address'     => 'ONLINE',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ));

        DB::table('reception')->insert(array(
            'name'        => 'MWR VENEZUELA',
            'province_id' => 23,
            'city'        => 'CARACAS',
            'address'     => 'CARACAS',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ));

        DB::table('reception')->insert(array(
            'name'        => 'MWR PANAMA',
            'province_id' => 8,
            'city'        => 'PANAMA',
            'address'     => 'PANAMA',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ));

        DB::table('people')->insert(array(
            'first_name'  => 'System',
            'last_name'   => 'Admin',
            'dni'         => '12345660',
            'phone_c'     => '55558888888',
            'province_id' => 23,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ));

        DB::table('people')->insert(array(
            'first_name'  => 'System',
            'last_name'   => 'Allucanship',
            'dni'         => '12345670',
            'phone_c'     => '55558888888',
            'province_id' => 23,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ));

        DB::table('people')->insert(array(
            'first_name'  => 'RECEPTION',
            'last_name'   => 'CENTER',
            'dni'         => '12345671',
            'phone_c'     => '55558888888',
            'province_id' => 23,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ));

        DB::table('people')->insert(array(
            'first_name'  => 'SHIPMENT',
            'last_name'   => 'CENTER',
            'dni'         => '12345672',
            'phone_c'     => '55558888888',
            'province_id' => 23,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ));

        DB::table('people')->insert(array(
            'first_name'  => 'in construction',
            'last_name'   => 'Admin',
            'dni'         => '12345673',
            'phone_c'     => '55558888888',
            'province_id' => 23,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ));

        DB::table('user')->insert(array(

            'email'        => 'admin1@admin.com',
            'password'     => bcrypt('gt123456'),
            'profile_id'   => 1,
            'people_id'    => 1,
            'reception_id' => 1,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('user')->insert(array(

            'email'        => 'allucanship@admin.com',
            'password'     => bcrypt('gt123456'),
            'profile_id'   => 2,
            'people_id'    => 2,
            'reception_id' => 1,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('user')->insert(array(

            'email'        => 'admin2@admin.com',
            'password'     => bcrypt('gt123456'),
            'profile_id'   => 4,
            'people_id'    => 3,
            'reception_id' => 1,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('user')->insert(array(

            'email'        => 'admin3@admin.com',
            'password'     => bcrypt('gt123456'),
            'profile_id'   => 5,
            'people_id'    => 4,
            'reception_id' => 1,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('user')->insert(array(

            'email'        => 'admin4@admin.com',
            'password'     => bcrypt('gt123456'),
            'profile_id'   => 6,
            'people_id'    => 5,
            'reception_id' => 1,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        //factory(App\Models\Administration\ReceptionCenter::class, 14)->create();

        factory(App\Models\Credentials\People::class, 20)->create();

        factory(App\Models\Credentials\User::class, 20)->create();
    }
}
