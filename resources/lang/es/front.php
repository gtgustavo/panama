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

            'board'          => 'Inicio',

            'employees'      => 'Empleados',

            'credentials'    => 'Credenciales',

            'support'        => 'Soporte',

            'deal'           => 'Negocio',
        ],

        'sub_title' => [

            'administrator'     => 'Administratores',

            'employees'         => 'Empleados',

            'profiles'          => 'Perfiles',

            'packages'          => 'Paquetes',

            'clients'           => 'Clientes',

            'shipment'          => 'Embarques',

            'reception_centers' => 'Centros de Recepción',

            'diary'             => 'Direcciones de Envío',

            'tickets'           => 'Tickets de Soporte',

            'support'           => 'Soporte',

            'roads'             => 'Rutas',

            'box'               => 'Cajas',
        ],

        'sub_sub_title' => [

            'list_employee'         => 'Todos los Empleados',

            'list_profile'          => 'Todos los Perfiles',

            'list_client'           => 'Todos los Clientes',

            'list_shipment'         => 'Todos los Embarques',

            'list_reception_center' => 'Centros de Recepción',

            'list_recipient'        => 'Ver Dirección',

            'list_administrator'    => 'Administradores',

            'list_ticket'           => 'Tickets de Soporte',

            'list_road'             => 'Todas las Rutas',

            'list_box'              => 'Todas las Cajas',
        ],

    ],

    'form' => [

        'element' => [

            'option'         => 'Seleccione un elemento de la lista',

            'not_country'    => 'No existe data disponible para el país seleccionado',

            'not_consigning' => 'No existen direcciones de envío para este cliente',

        ],

        'profile' => [

            'title' => 'PERFILES ADMINISTRATIVOS',

            'create' => 'Nuevo Perfil',

            'tile' => [

                'profiles' => 'PERFILES ADMINISTRATIVOS',

                'roles'    => 'ROLES',

                'users'    => 'EMPLEADOS',

                'admin'    => 'ADMINISTRADORES'

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

        'other'      => [

            'wed'    => 'Web Check In',

            'go_web' => 'Ir a la Pagina',

        ],

        'reception_center' => [

            'title' => 'CENTROS DE RECEPCIÓN',

            'create' => 'Nuevo Centro de Recepción',

            'tile' => [

                'reception' => 'CENTROS DE RECEPCIÓN',
            ],

            'table' => [

                'name'     => 'NOMBRE',

                'country'  => 'PAÍS',

                'province' => 'PROVINCIA',

                'city'     => 'CIUDAD',

                'employee' => 'EMPLEADOS',

                'client'   => 'CLIENTES',

                'package'  => 'PAQUETES',
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

        'road' => [

            'title' => 'RUTAS',

            'create' => 'Nueva Ruta',

            'tile' => [

                'road' => 'RUTAS DE ENVIO',
            ],

            'table' => [

                'name'             => 'RUTA',

            ],

            'events' => [

                'create' => 'Nueva Ruta',

                'edit'   => 'Actualizar Ruta',
            ],
        ],

        'box' => [

            'title' => 'CAJAS',

            'create' => 'Nueva Caja',

            'tile' => [

                'enabled'  => 'CAJAS ACTIVAS',

                'disabled' => 'CAJAS OCULTAS',
            ],

            'table' => [

                'box'              => 'CAJA',

                'dimensions'       => 'DIMENSIONES',

                'maximum_poundage' => 'PESO',

                'measure'          => 'LB',

                'cost_extra_pound' => 'LIBRA EXTRA',

                'cost_standard'    => 'PRECIO ESTÁNDAR',

                'cost_express'     => 'PRECIO EXPRÉS',

                'status'           => 'ESTATUS',
            ],

            'events' => [

                'create' => 'Nueva Caja',

                'edit'   => 'Actualizar Caja',
            ],
        ],

        'ticket' => [

            'title' => 'TICKETS DE SOPORTE',

            'create' => 'Nuevo Ticket',

            'tile' => [

                'ticket'    => 'TICKETS DE SOPORTE',

                'pending'   => 'SOLICITUDES PENDIENTES',

                'responded' => 'SOLICITUDES ATENDIDAS',

            ],

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

            'answer' => 'Responder Solicitud',

            'table' => [

                'name'   => 'NOMBRE',

                'dni'    => 'CÉDULA',

                'theme'  => 'TEMA',

                'status' => 'ESTATUS',

                'date'   => 'FECHA',
            ],

            'events' => [

                'create' => 'Crear Solicitud de Soporte',

                'answer' => 'Respuesta Solicitud de Soporte',
            ],

        ],

        'administrator' => [

            'title' => 'ADMINISTRADORES',

            'create' => 'Nuevo Administrador',

            'table' => [

                'name'             => 'NOMBRE',

                'dni'              => 'CÉDULA',

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

                'client' => 'CLIENTES REGISTRADOS',

            ],

            'table' => [

                'name'             => 'NOMBRE',

                'dni'              => 'CÉDULA',

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

            'create' => 'Agregar dirección',

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

                'create' => 'Agregar dirección',

                'edit'   => 'Actualizar Dirección de Envío',
            ],
        ],

        'package' => [

            'title' => 'PAQUETES',

            'create' => 'Nuevo Paquete',

            'tile' => [

                'web_check_in'         => 'WEB CHECK IN (PRECHEQUEADO)',

                'reception_center'     => 'ENTREGADO EN CENTRO',

                'sent_shipping'        => 'ENVIADO A CENTRO DE EMBARQUE',

                'received_shipping'    => 'RECIBIDO EN CENTRO DE EMBARQUE',

                'shipment'             => 'EMBARCADO A PAÍS DESTINO',

                'received_destination' => 'ENTREGADO AL RECEPTOR',
            ],

            'table' => [

                'name_e'     => 'EMISOR',

                'name_r'     => 'RECEPTOR',

                'dni'        => 'CÉDULA',

                'wr'         => 'WR',

                'wb'         => 'WB',

                'consigning' => 'PAÍS DESTINO',

                'type'       => 'TIPO DE CAJA',

                'cost'       => 'COSTO',

                'status'     => 'ESTATUS',

                'date'       => 'FECHA',
            ],

            'events' => [

                'create' => 'Nuevo Paquete',

                'edit'   => 'Actualizar Paquete',
            ],
        ],

        'shipment' => [

            'title' => 'EMBARQUES',

            'create' => 'Nuevo Embarque',

            'tile' => [

                'wb_open'  => 'GUÍAS DE EMBARQUE ABIERTA',

                'wb_close' => 'GUÍAS DE EMBARQUE CERRADO',
            ],

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

            'title'      => 'Opciones',

            'edit'       => 'Actualizar',

            'delete'     => 'Eliminar',

            'config'     => 'Configurar',

            'consigning' => 'Agenda',

            'annular'    => 'Anular',

            'answer'     => 'Respuesta',

            'status'     => 'Cambiar',

            'received'   => 'Recibir',

            'close'      => 'Cerrar',
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