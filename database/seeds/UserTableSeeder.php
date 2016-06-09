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
        DB::table('users')->insert(array(

            'first_name' => 'System',
            'last_name'  => 'Admin',
            'dni'        => '12345678',
            'phone_c'    => '04161234567',
            'email'      => 'admin1@admin.com',
            'password'   => bcrypt('gt123456'),
            //'status'     => 'active',
            'profile_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ));

        //factory(App\Models\User::class, 29)->create();
    }
}
