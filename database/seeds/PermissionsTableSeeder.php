<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->profile();
        $this->role_administrations();
        $this->role_warehouse();
        $this->add_roles();
    }


    private function profile()
    {
        DB::table('profile')->insert(array(
            'name'         => 'ADMIN',
            'description'  => 'ADMIN',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('profile')->insert(array(
            'name'         => 'CLIENTE',
            'description'  => 'CLIENTE',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('profile')->insert(array(
            'name'         => 'EMPLEADO',
            'description'  => 'EMPLEADO',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));
    }

    private function role_administrations()
    {
        DB::table('role')->insert(array(
            'name'         => 'login-users',
            'display_name' => 'Iniciar Sesion',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'logout-users',
            'display_name' => 'Cerrar Sesion',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        // PROFILES

        DB::table('role')->insert(array(
            'name'         => 'view-profiles',
            'display_name' => 'Leer Perfiles',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'create-profiles',
            'display_name' => 'Crear Perfiles',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'edit-profiles',
            'display_name' => 'Modificar Perfiles',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'delete-profiles',
            'display_name' => 'Borrar Perfiles',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'permissions-profiles',
            'display_name' => 'Asignar Permisos a Perfiles',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        // EMPLOYEES

        DB::table('role')->insert(array(
            'name'         => 'view-employees',
            'display_name' => 'Leer Empleados',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'create-employees',
            'display_name' => 'Crear Empleados',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'edit-employees',
            'display_name' => 'Modificar Empleados',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'delete-employees',
            'display_name' => 'Borrar Empleados',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));
    }

    // WAREHOUSE
    private function role_warehouse()
    {
        // PACKAGE

        DB::table('role')->insert(array(
            'name'         => 'view-package',
            'display_name' => 'Leer Paquetes',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'create-package',
            'display_name' => 'Crear Paquetes',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'edit-package',
            'display_name' => 'Modificar Paquetes',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'delete-package',
            'display_name' => 'Borrar Paquetes',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        //CLIENTS

        DB::table('role')->insert(array(
            'name'         => 'view-client',
            'display_name' => 'Leer Clientes',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'create-client',
            'display_name' => 'Crear Clientes',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'edit-client',
            'display_name' => 'Modificar Clientes',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'delete-client',
            'display_name' => 'Borrar Clientes',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));
    }

    private function add_roles()
    {
        for($i=3; $i < 20; $i++)
        {
            DB::table('profile_role')->insert(array(
                'role_id'    => $i,
                'profile_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ));
        }
    }
}
