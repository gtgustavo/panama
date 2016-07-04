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

        'annular_package'     => '¿ESTA SEGURO DE ANULAR ESTE PAQUETE?',
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

    'administrator' => [

        'create' => 'Administrador: :employee, creado satisfactoriamente',

        'update' => 'Administrador: :employee, actualizado satisfactoriamente',

        'delete' => 'Administrador: :employee, eliminado satisfactoriamente',

        'assign' => 'Asignación de permisos realizado satisfactoriamente, al Administrador: :employee',

        'danger' => 'No puede realizar la opción seleccionada sobre el Administrador: :employee',
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

        'annular'     => 'Paquete: :package, anulado satisfactoriamente',

        'not_action'  => 'No puede ejecutar la opción seleccionada sobre el paquete: :package, después de pasar el estatus a: enviado a centro de embarque',

        'null'        => 'Paquete: :package, se encuentra anulado y no puede ejecutar la opción seleccionada',

        'error_dni'   => 'El DNI: :dni, no se encuentra en nuestros registros.',

        'success_dni' => ':client',

        'change'      => 'Estatus cambiado a: :status',
    ],

    'shipment' => [

        'create'      => 'Guía de embarque: :shipment, creado satisfactoriamente',

        'exist'       => 'No puede crear una nueva guía de embarque hasta cerrar la existente',

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

    'panel' => [

        'password'  => 'Su contraseña ha sido actualizada satisfactoriamente',

        'personal'  => 'Su información personal ha sido actualizada satisfactoriamente',

        'image'     => 'Ha actualizado su imagen de perfil satisfactoriamente',
    ],

    'ticket' => [

        'create' => 'Ticket: :ticket, creado satisfactoriamente',

        'update' => 'Ticket: :ticket, actualizado satisfactoriamente',

        'delete' => 'Ticket: :ticket, eliminado satisfactoriamente',
    ],

    'support' => [

        'create' => 'Solicitud: :ticket, creada satisfactoriamente',

        'answer' => 'Solicitud: :ticket, respondida satisfactoriamente',

        'close'  => 'No puede crear mas solicitudes hasta finalizar la que se encuentra pendiente'
    ],

    'road' => [

        'create' => 'Ruta: :road, creada satisfactoriamente',

        'update' => 'Ruta: :road, actualizada satisfactoriamente',

        'delete' => 'Ruta: :road, eliminada satisfactoriamente',
    ],

    'box' => [

        'create' => 'Caja: :box, creada satisfactoriamente',

        'update' => 'Caja: :box, actualizada satisfactoriamente',

        'delete' => 'Caja: :box, eliminada satisfactoriamente',

        'status' => 'Se ha cambiado el estatus de la caja: :box, a: :status satisfactoriamente',
    ],

];