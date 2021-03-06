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
        $this->role_login();
        $this->role_super_admin();
        $this->role_administrations();
        $this->role_client();
        $this->role_warehouse();
        $this->role_shipment();
        $this->role_received();
        $this->add_roles();
    }

    private function profile()
    {
        DB::table('profile')->insert(array(
            'name'         => 'SUPER ADMINISTRADOR',
            'description'  => 'SUPER ADMINISTRADOR',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('profile')->insert(array(
            'name'         => 'ADMINISTRADOR',
            'description'  => 'ADMINISTRADOR',
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
            'name'         => 'EMPLEADO CENTRO DE RECEPCIÓN',
            'description'  => 'EMPLEADO CENTRO DE RECEPCIÓN',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('profile')->insert(array(
            'name'         => 'EMPLEADO CENTRO DE EMBARCACIÓN',
            'description'  => 'EMPLEADO CENTRO DE EMBARCACIÓN',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('profile')->insert(array(
            'name'         => 'EMPLEADO PAÍS DE RECEPCIÓN',
            'description'  => 'EMPLEADO PAÍS DE RECEPCIÓN',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));
    }

    private function role_login()
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
    }

    private function role_super_admin()
    {
        // ADMINISTRATOR
        DB::table('role')->insert(array(
            'name'         => 'view-administrator',
            'display_name' => 'Leer Administradores',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'create-administrator',
            'display_name' => 'Crear Administradores',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'edit-administrator',
            'display_name' => 'Modificar Administradores',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'delete-administrator',
            'display_name' => 'Borrar Administradores',
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
    }

    private function role_administrations()
    {
        // RECEPTION CENTER
        DB::table('role')->insert(array(
            'name'         => 'view-reception-center',
            'display_name' => 'Leer Centro de Recepción',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'create-reception-center',
            'display_name' => 'Crear Centro de Recepción',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'edit-reception-center',
            'display_name' => 'Modificar Centro de Recepción',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'delete-reception-center',
            'display_name' => 'Borrar Centro de Recepción',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        // SUPPORT TICKET
        DB::table('role')->insert(array(
            'name'         => 'view-tickets',
            'display_name' => 'Leer Tickes de Soporte',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'create-tickets',
            'display_name' => 'Crear Tickes de Soporte',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'edit-tickets',
            'display_name' => 'Modificar Tickes de Soporte',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'delete-tickets',
            'display_name' => 'Borrar Tickes de Soporte',
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

        // ROADS
        DB::table('role')->insert(array(
            'name'         => 'view-road',
            'display_name' => 'Leer Rutas',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'create-road',
            'display_name' => 'Crear Rutas',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'edit-road',
            'display_name' => 'Modificar Rutas',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'delete-road',
            'display_name' => 'Borrar Rutas',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        // BOX
        DB::table('role')->insert(array(
            'name'         => 'view-box',
            'display_name' => 'Leer Cajas',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'create-box',
            'display_name' => 'Crear Cajas',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'edit-box',
            'display_name' => 'Modificar Cajas',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'delete-box',
            'display_name' => 'Borrar Cajas',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'status-box',
            'display_name' => 'Estatus de Cajas',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));
    }

    private function role_client()
    {
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

        // consigning
        DB::table('role')->insert(array(
            'name'         => 'view-consigning',
            'display_name' => 'Leer Agenda de Cliente',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'create-consigning',
            'display_name' => 'Crear Agenda de Cliente',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'edit-consigning',
            'display_name' => 'Modificar Agenda de Cliente',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'delete-consigning',
            'display_name' => 'Borrar Agenda de Cliente',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        //SUPPORT
        DB::table('role')->insert(array(
            'name'         => 'view-support',
            'display_name' => 'Leer Solicitudes de Soporte',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'create-support',
            'display_name' => 'Responder Solicitudes de Soporte',
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
    }

    // Shipment
    private function role_shipment()
    {
        // Shipment
        DB::table('role')->insert(array(
            'name'         => 'view-shipment',
            'display_name' => 'Leer Embarques',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'create-shipment',
            'display_name' => 'Crear Embarques',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'edit-shipment',
            'display_name' => 'Modificar Embarques',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'delete-shipment',
            'display_name' => 'Borrar Embarques',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));
    }

    // Received
    private function role_received()
    {
        // Shipment
        DB::table('role')->insert(array(
            'name'         => 'received-shipment',
            'display_name' => 'Recibir Embarques',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));

        DB::table('role')->insert(array(
            'name'         => 'deliver-package',
            'display_name' => 'Entregar Paquetes',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ));
    }

    private function add_roles()
    {
        // SUPER ADMIN
        for($i=3; $i < 53; $i++)
        {
            DB::table('profile_role')->insert(array(
                'role_id'    => $i,
                'profile_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ));
        }

        // ADMIN
        for($i=7; $i < 53; $i++)
        {
            DB::table('profile_role')->insert(array(
                'role_id'    => $i,
                'profile_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ));
        }

        // CLIENT
        for($i=37; $i < 41; $i++)
        {
            DB::table('profile_role')->insert(array(
                'role_id'    => $i,
                'profile_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ));
        }
    }
}
