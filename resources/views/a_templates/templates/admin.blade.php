<!doctype html>

<html lang="es">

    <head>

        @include('a_templates.partials.head')

        @include('a_templates.partials.style')

    </head>

    <body class="ecommerce-page">

        @yield('content')

        @include('a_templates.partials.script')

    </body>

</html>