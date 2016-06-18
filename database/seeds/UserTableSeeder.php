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
            'country'     => 'ONLINE',
            'province'    => 'ONLINE',
            'city'        => 'ONLINE',
            'postal_code' => 'ONLINE',
            'address'     => 'ONLINE',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ));

        DB::table('people')->insert(array(
            'first_name'  => 'System',
            'last_name'   => 'Admin',
            'dni'         => '12345678',
            'phone_c'     => '55558888888',
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

        factory(App\Models\Administration\ReceptionCenter::class, 49)->create();

        factory(App\Models\Credentials\People::class, 200)->create();

        factory(App\Models\Credentials\User::class, 200)->create();
    }
}
