<?php

return [

    'author'  => '2016 - Gustavo Perez',

    'head'    => [

        'title' => 'AdminDesigns',

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

            'menu'      => 'Menú',

            'security'  => 'Seguridad',

            'warehouse' => 'Warehouse',
        ],

        'title' => [

            'board'          => 'Dashboard',

            'administration' => 'Administración',
        ],

        'sub_title' => [

            'employees' => 'Empleados',

            'profiles'  => 'Perfiles',

            'packages'  => 'Paquetes',

            'clients'   => 'Clientes',
        ],

        'sub_sub_title' => [

            'list_employee'   => 'Todos los Empleados',

            'list_profile'    => 'Todos los Perfiles',

            'list_client'     => 'Todos los Clientes',
        ],

    ],

    'form' => [

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

        'employee' => [

            'title' => 'EMPLEADOS',

            'create' => 'Nuevo Empleado',

            'table' => [

                'name'    => 'NOMBRE',

                'dni'     => 'DNI',

                'email'   => 'EMAIL',

                'profile' => 'PERFIL',

                'phone_c' => 'TLF. MÓVIL',

                'phone_h' => 'TLF. HABITACIÓN',
            ],

            'events' => [

                'create' => 'Nuevo Empleado',

                'edit'   => 'Actualizar Empleado',
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

                'name'    => 'NOMBRE',

                'dni'     => 'DNI',

                'email'   => 'EMAIL',

                'profile' => 'PERFIL',

                'phone_c' => 'TLF. MÓVIL',

                'phone_h' => 'TLF. HABITACIÓN',
            ],

            'events' => [

                'create' => 'Nuevo Cliente',

                'edit'   => 'Actualizar Cliente',
            ],
        ],

        'package' => [

            'title' => 'PAQUETES',

            'create' => 'Nuevo Paquete',

            'table' => [

                'name'    => 'NOMBRE',

                'dni'     => 'DNI',

                'email'   => 'EMAIL',

                'profile' => 'PERFIL',

                'phone_c' => 'TLF. MÓVIL',

                'phone_h' => 'TLF. HABITACIÓN',
            ],

            'events' => [

                'create' => 'Nuevo Paquete',

                'edit'   => 'Actualizar Paquete',
            ],
        ],

        'actions' => [

            'title'   => 'Acciones',

            'edit'    => 'Actualizar',

            'delete'  => 'Eliminar',

            'config'  => 'Configurar',
        ],

        /*
         * Translations from buttons
         */

        'button' => [

            'login'   => 'Iniciar Sesión',

            'logout'  => 'Cerrar Sesión',

            'reset'   => 'RESTABLECER',

            'cancel'  => 'CANCELAR',

            'sign_up' => 'Registro',

            'update'  => 'ACTUALIZAR',

            'assign'  => 'ASIGNAR',

            'remove'  => 'REMOVER',

            'search'  => 'BUSCAR',

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

    ],

];