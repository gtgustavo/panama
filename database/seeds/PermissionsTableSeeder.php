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
        $this->role();
        $this->permissions_administrations();
        $this->add_permissions();
    }


    private function role()
    {
        DB::table('role')->insert(array(
            'name'         => 'ADMIN',
            'description'  => 'ADMIN',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'CLIENTE',
            'description'  => 'CLIENTE',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'EMPLEADO',
            'description'  => 'EMPLEADO',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));
    }

    private function permissions_administrations()
    {
        DB::table('permission')->insert(array(
            'name'         => 'login-users',
            'display_name' => 'Iniciar Sesion',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('permission')->insert(array(
            'name'         => 'logout-users',
            'display_name' => 'Cerrar Sesion',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        // PROFILES

        DB::table('permission')->insert(array(
            'name'         => 'view-profiles',
            'display_name' => 'Leer Perfiles',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('permission')->insert(array(
            'name'         => 'create-profiles',
            'display_name' => 'Crear Perfiles',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('permission')->insert(array(
            'name'         => 'edit-profiles',
            'display_name' => 'Modificar Perfiles',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('permission')->insert(array(
            'name'         => 'delete-profiles',
            'display_name' => 'Borrar Perfiles',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('permission')->insert(array(
            'name'         => 'permissions-profiles',
            'display_name' => 'Asignar Permisos a Perfiles',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        // EMPLOYEES

        DB::table('permission')->insert(array(
            'name'         => 'view-employees',
            'display_name' => 'Leer Empleados',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('permission')->insert(array(
            'name'         => 'create-employees',
            'display_name' => 'Crear Empleados',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('permission')->insert(array(
            'name'         => 'edit-employees',
            'display_name' => 'Modificar Empleados',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('permission')->insert(array(
            'name'         => 'delete-employees',
            'display_name' => 'Borrar Empleados',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('permission')->insert(array(
            'name'         => 'credentials-employees',
            'display_name' => 'Agregar / Remover Credenciales de Acceso',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));
    }

    private function add_permissions()
    {
        for($i=3; $i < 13; $i++)
        {
            DB::table('permission_role')->insert(array(
                'permission_id' => $i,
                'role_id'       => 1,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ));
        }
    }
}
