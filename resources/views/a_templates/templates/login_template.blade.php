<!doctype html>

<html lang="es">

    <head>

        @include('a_templates.partials.head')

        @include('a_templates.partials.style')

    </head>

    <body class="external-page sb-l-c sb-r-c">

        @yield('content')

        @include('a_templates.partials.script')

    </body>

</html>