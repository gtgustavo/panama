<?php

return [

    'errors' => [

        'access_denied' => 'NO TIENE AUTORIZACIÓN PARA ACCEDER A LA OPCIÓN SELECCIONADA',

    ],

    'confirm' => [

        'delete_register'     => '¿DESEA ELIMINAR EL REGISTRO SELECCIONADO?',

        'remove_credentials'  => '¿ESTA SEGURO DE ELIMINAR LAS CREDENCIALES DE ACCESO DE ESTE EMPLEADO?',

        'change_status'       => '¿ESTA SEGURO DE CAMBIAR EL ESTATUS?',

        'error_change_status' => 'HA OCURRIDO UN ERROR AL CAMBIAR LOS ESTATUS DE PAQUETES, POR FAVOR COMUNIQUES CON EL ADMINISTRADOR DEL SISTEMA',

        'select_status'       => 'DEBE SELECCIONAR EL ESTATUS AL QUE DESEA CAMBIAR LOS PAQUETES',

        'select_package'      => 'DEBE SELECCIONAR AL MENOS UN PAQUETE ',
    ],

    'system' => [

        'profile_create' => 'Perfil Administrativo: :profile, creado satisfactoriamente',

        'profile_update' => 'Perfil Administrativo: :profile, actualizado satisfactoriamente',

        'profile_delete' => 'Perfil Administrativo: :profile, eliminado satisfactoriamente',

        'profile_assign' => 'Asignación de permisos realizado satisfactoriamente, al Perfil: :profile',

        'profile_danger' => 'No puede realizar la opción seleccionada sobre el Perfil: :profile',
    ],

    'employee' => [

        'create' => 'Empleado: :employee, creado satisfactoriamente',

        'update' => 'Empleado: :employee, actualizado satisfactoriamente',

        'delete' => 'Empleado: :employee, eliminado satisfactoriamente',

        'assign' => 'Asignación de permisos realizado satisfactoriamente, al Empleado: :employee',

        'danger' => 'No puede realizar la opción seleccionada sobre el Empleado: :employee',
    ],

    'client' => [

        'create'  => 'Cliente: :client, creado satisfactoriamente',

        'update'  => 'Cliente: :client, actualizado satisfactoriamente',

        'delete'  => 'Cliente: :client, eliminado satisfactoriamente',

        'account' => 'Su cuanta ha sido creada satisfactoriamente',
    ],

    'package' => [

        'create'      => 'Paquete: :package, creado satisfactoriamente',

        'update'      => 'Paquete: :package, actualizado satisfactoriamente',

        'delete'      => 'Paquete: :package, eliminado satisfactoriamente',

        'error_dni'   => 'El DNI: :dni, no se encuentra en nuestros registros.',

        'success_dni' => ':client',

        'change'      => 'Estatus cambiado a: :status',
    ],

    'consigning' => [

        'create'        => 'Ha sido agregada una dirección de envío al País :consign',

        'update'        => 'Ha sido actualizada una dirección de envío al País :consign',

        'delete'        => 'Ha sido eliminada una dirección de envío al País :consign',

        'error_consign' => 'Este cliente no posee rutas de envío disponibles',
    ],

    'reception_center' => [

        'create' => 'Centro de Recepción :center, creado satisfactoriamente',

        'update' => 'Centro de Recepción :center, actualizado satisfactoriamente',

        'delete' => 'Centro de Recepción :center, eliminado satisfactoriamente',

        'danger' => 'No puede realizar la opción seleccionada sobre el Centro de Recepción: :center',
    ],

];