<?php

return [

    'author'  => '2016 - Gustavo Perez',

    'head'    => [

        'title' => 'ALL-U-CAN SHIP',

    ],

    'header' => [

        'top' => [

            'language' => [

                'language' => 'Idioma',

                'es'       => 'Español',

                'en'       => 'Ingles',
            ],
        ],

        'below' => [



        ],

    ],

    'sidebar' => [

        'label' => [

            'menu'           => 'Menú',

            'security'       => 'Seguridad',

            'administration' => 'Administración',

            'attention'      => 'Atención',

            'warehouse'      => 'Warehouse',

            'shipment'       => 'shipment',

            'recipient'      => 'Destinatarios',

            'support'        => 'Soporte',
        ],

        'title' => [

            'board'          => 'Dashboard',

            'employees'      => 'Empleados',

            'credentials'    => 'Credenciales',

            'support'        => 'Soporte',
        ],

        'sub_title' => [

            'administrator'     => 'Administratores',

            'employees'         => 'Empleados',

            'profiles'          => 'Perfiles',

            'packages'          => 'Paquetes',

            'clients'           => 'Clientes',

            'shipment'          => 'Embarques',

            'reception_centers' => 'Centros de Recepción',

            'diary'             => 'Agenda',

            'tickets'           => 'Tickets de Soporte',

            'support'           => 'Soporte',
        ],

        'sub_sub_title' => [

            'list_employee'         => 'Todos los Empleados',

            'list_profile'          => 'Todos los Perfiles',

            'list_client'           => 'Todos los Clientes',

            'list_shipment'         => 'Todos los Embarques',

            'list_reception_center' => 'Centros de Recepción',

            'list_recipient'        => 'Direcciones de Envío',

            'list_administrator'    => 'Administradores',

            'list_ticket'           => 'Tickets de Soporte'
        ],

    ],

    'form' => [

        'element' => [

            'option' => 'Seleccione un elemento de la lista',

        ],

        'profile' => [

            'title' => 'PERFILES ADMINISTRATIVOS',

            'create' => 'Nuevo Perfil',

            'tile' => [

                'profiles' => 'PERFILES ADMINISTRATIVOS',

                'roles'    => 'ROLES',

                'users'    => 'EMPLEADOS',

            ],

            'table' => [

                'profile'     => 'PERFIL',

                'description' => 'DESCRIPCIÓN',

                'roles'       => 'ROLES',

                'employees'   => 'EMPLEADOS',
            ],

            'events' => [

                'create' => 'Nuevo Perfil Administrativo',

                'edit'   => 'Actualizar Perfil Administrativo',

                'config' => 'Configurar roles a Perfil Administrativo',
            ],

            'select' => [

                'available' => 'Roles Disponibles',

                'config'    => 'Roles Configurados al Perfil',
            ],
        ],

        'other' => [

            'wed' => 'Web Check In',

        ],

        'reception_center' => [

            'title' => 'CENTROS DE RECEPCIÓN',

            'create' => 'Nuevo Centro de Recepción',

            'table' => [

                'name'     => 'NOMBRE',

                'country'  => 'PAÍS',

                'province' => 'PROVINCIA',

                'city'     => 'CIUDAD',

                'employee' => 'EMPLEADO',
            ],

            'events' => [

                'create' => 'Nuevo Centro de Recepción',

                'edit'   => 'Actualizar Centro de Recepción',
            ],
        ],

        'employee' => [

            'title' => 'EMPLEADOS',

            'create' => 'Nuevo Empleado',

            'table' => [

                'name'             => 'NOMBRE',

                'dni'              => 'DNI',

                'email'            => 'EMAIL',

                'profile'          => 'PERFIL',

                'reception_center' => 'CENTRO DE RECEPCIÓN'
            ],

            'events' => [

                'create' => 'Nuevo Empleado',

                'edit'   => 'Actualizar Empleado',
            ],
        ],

        'ticket' => [

            'title' => 'TICKETS DE SOPORTE',

            'create' => 'Nuevo Ticket',

            'table' => [

                'theme'     => 'TEMA',

                'pending'   => 'PENDIENTES',

                'responded' => 'RESPONDIDOS',
            ],

            'events' => [

                'create' => 'Nuevo Ticket',

                'edit'   => 'Actualizar Ticket',
            ],

        ],

        'support' => [

            'title' => 'SOPORTE',

            'create' => 'Crear Solicitud',

            'table' => [

                'theme'  => 'TEMA',

                'status' => 'ESTATUS',

                'date'   => 'FECHA',
            ],

            'events' => [

                'create' => 'Crear Solicitud de Soporte',
            ],

        ],

        'administrator' => [

            'title' => 'ADMINISTRADORES',

            'create' => 'Nuevo Administrador',

            'table' => [

                'name'             => 'NOMBRE',

                'dni'              => 'DNI',

                'email'            => 'EMAIL',

                'profile'          => 'PERFIL',

                'reception_center' => 'CENTRO DE RECEPCIÓN'
            ],

            'events' => [

                'create' => 'Nuevo Administrador',

                'edit'   => 'Actualizar Administrador',
            ],
        ],

        'client' => [

            'title' => 'CLIENTES',

            'create' => 'Nuevo Cliente',

            'tile' => [

                'clients' => 'CLIENTES REGISTRADOS',

                'stop'    => 'stop',

            ],

            'table' => [

                'name'             => 'NOMBRE',

                'dni'              => 'DNI',

                'country'          => 'PAÍS',

                'email'            => 'EMAIL',

                'profile'          => 'PERFIL',

                'phone_c'          => 'TLF. MÓVIL',

                'phone_h'          => 'TLF. HABITACIÓN',

                'consigning'       => 'CONSIGNING',

                'reception_center' => 'CENTRO DE RECEPCIÓN',
            ],

            'events' => [

                'create' => 'Nuevo Cliente',

                'edit'   => 'Actualizar Cliente',
            ],
        ],

        'consigning' => [

            'title'  => 'DIRECCIONES DE ENVÍO',

            'create' => 'Nueva Dirección de Envío',

            'tile' => [

                'consigning' => 'DIRECCIONES DE ENVÍO',

                'stop'       => 'stop',

            ],

            'table' => [

                'name'            => 'RECEPTOR',

                'phone'           => 'TELÉFONO',

                'country'         => 'PAÍS',

                'province'        => 'PROVINCIA',

                'city'            => 'CIUDAD',

                'postal_code'     => 'CÓDIGO POSTAL',

                'address'         => 'DIRECCIÓN',

                'reference_point' => 'PUNTO DE REFERENCIA',
            ],

            'events' => [

                'create' => 'Nueva Dirección de Envío',

                'edit'   => 'Actualizar Dirección de Envío',
            ],
        ],

        'package' => [

            'title' => 'PAQUETES',

            'create' => 'Nuevo Paquete',

            'tile' => [

                'packages' => 'PAQUETES EN LA CATEGORÍA',

            ],

            'table' => [

                'name_e'     => 'EMISOR',

                'name_r'     => 'RECEPTOR',

                'dni'        => 'DNI',

                'wr'         => 'WR',

                'wb'         => 'WB',

                'consigning' => 'PAÍS DESTINO',

                'type'       => 'TIPO DE CAJA',

                'cost'       => 'COSTO',

                'status'     => 'ESTATUS',
            ],

            'events' => [

                'create' => 'Nuevo Paquete',

                'edit'   => 'Actualizar Paquete',
            ],
        ],

        'shipment' => [

            'title' => 'EMBARQUES',

            'create' => 'Nuevo Embarque',

            'table' => [

                'wb'         => 'WB',

                'status'     => 'ESTATUS',

                'date_s'     => 'Fecha de Salida',

                'packages'   => 'Paquetes',

            ],

            'events' => [

                'create' => 'Nuevo Embarque',

                'edit'   => 'Actualizar Paquete',
            ],
        ],

        'profile_panel' => [

            'change_password'    => 'Cambiar Contraseña',

            'update_information' => 'Actualizar Informacion',

        ],

        'actions' => [

            'title'      => 'Acciones',

            'edit'       => 'Actualizar',

            'delete'     => 'Eliminar',

            'config'     => 'Configurar',

            'consigning' => 'Agenda',

            'annular'    => 'Anular',
        ],

        /*
         * Translations from buttons
         */

        'button' => [

            'login'            => 'Iniciar Sesión',

            'logout'           => 'Cerrar Sesión',

            'reset'            => 'Restablecer',

            'sign_up'          => 'Crea una Cuenta',

            'forget'           => '¿Olvido su contraseña?',

            'search'           => 'BUSCAR',

            'status'           => 'CAMBIAR ESTATUS',

            'account_settings' => 'Configuraciones de la Cuenta',
        ],

        'paginate' => [

            'page' => 'PÁGINA',

            'of'   => 'DE'

        ],

    ],

    /*
     * Translations from email messages
     */

    'email' => [

        'reset'   => 'Enlace de restablecimiento',

        'subject' => 'Enlace de restablecimiento',

        'subject_credentials' => 'Credenciales de Acceso',

    ],

];