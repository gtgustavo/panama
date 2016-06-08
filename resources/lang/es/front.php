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

            'menu'     => 'Menú',

            'security' => 'Seguridad',

            'package'  => 'Paquetes',
        ],

        'title' => [

            'board'          => 'Dashboard',

            'administration' => 'Administración',
        ],

        'sub_title' => [

            'employees' => 'Empleados',

            'profiles'  => 'Perfiles',

            'packages'  => 'Paquetes',
        ],

        'sub_sub_title' => [

            'create_employee' => 'Crear Empleado',

            'list_employee'   => 'Todos los Empleados',

            'create_profile'  => 'Crear Perfil',

            'list_profile'    => 'Todos los Perfiles',

            'new_package'     => 'Nuevo Paquete',
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

        'actions' => [

            'title'       => 'Acciones',

            'edit'        => 'Actualizar',

            'delete'      => 'Eliminar',

            'config'      => 'Configurar',

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